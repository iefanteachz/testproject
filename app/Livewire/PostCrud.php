<?php

namespace App\Livewire;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Log;


class PostCrud extends Component
{
    use WithPagination;
    public $body, $post_id; 
    public $title ='';
    public $search = '';
    public $location_id = '';
    public $query = []; // Search query
    public $result = []; // Search result
    public $titles = []; // Search result
    public $locations = [];
    public $isModalOpen = false;

    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        // Load filter options (you can adjust these based on your requirements)
        $this->titles = Post::select('title')->distinct()->pluck('title')->toArray();
        $this->locations = Location::all(); 
        $this->filterall = Post::paginate(5);
    }
    public function render()
    {
        $this->posts = Post::paginate(5); 
      
        return view('livewire.post-crud', [ 
            'result' => $this->result, // Result filtered by other methods or kept as all data
            'posts' => $this->posts, // Search query
        ]);
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->title = '';
        $this->body = '';
        $this->location_id = '';
        $this->status='';
        $this->post_id = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'location_id' => 'required',
        ]);

        $existingPost = Post::find($this->post_id);
        $before = $existingPost ? $existingPost->only(['title', 'body', 'location_id','status']) : null;

        $post = Post::updateOrCreate(['id' => $this->post_id], [
            
            
            'title' => $this->title,
            'body' => $this->body,
            'status'=> 0,
            'location_id' => $this->location_id,
        ]);

        $after = $post->only(['title', 'body', 'location_id']);
        
        createLog(
            $this->post_id ? 'Post Updated' : 'Post Created',
            $this->post_id ? "Updated post with ID {$this->post_id}" : "Created a new post",
            $before,
            $after
        );
                
        session()->flash('message', $this->post_id ? 'Post updated successfully.' : 'Post created successfully.');
        $this->closeModal();
        $this->resetFields();
    }

    public function toggleStatus($id)
    {

        $existingPost = Post::find($this->post_id);
        $before = $existingPost ? $existingPost->only(['title', 'body', 'location_id','status']) : null;

        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();

        $after = $post->only(['title', 'body', 'location_id','status']);
        
        createLog(
            $this->post_id ? 'Status Completed' : 'Status Not Completed',
            $this->post_id ? "Status updated post completed with ID {$this->post_id}" : "Status not completed",
            $before,
            $after
        );

        $this->posts = Post::all();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->status = $post->status;
        $this->location_id = $post->location_id;

        $this->openModal();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        
          // Log the delete action
          createLog(
            'Post Deleted',
            "Deleted post with ID {$id}",
            $post->only(['title', 'body', 'location_id']),
            null
        );

        $post->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
    public function filterall()
    {

        $query = Post::query();
        
        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('body', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->title) {
            $query->where('title', $this->title);
        }

        // $this->filteredPosts = $query->get();
        $this->result = $query->get();
        // return $result;
        
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Post;

class AppLayout extends Component
{
    
    public $posts;
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {   
        $this->posts = Post::all();
        return view('layouts.app');
    }

    
}

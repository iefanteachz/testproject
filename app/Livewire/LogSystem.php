<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;

class LogSystem extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = ''; // For filtering logs

    public function render()
    {
        $logs = Log::where('action', 'like', "%{$this->search}%")
                    ->orWhere('details', 'like', "%{$this->search}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        return view('livewire.log-system', compact('logs'));
    }
}
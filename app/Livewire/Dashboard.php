<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{   
    public $stats = [
        'users' => 120,
        'posts' => 45,
        'comments' => 300,
    ];

    
    public function render()
    {
        return view('livewire.dashboard');
    }
}

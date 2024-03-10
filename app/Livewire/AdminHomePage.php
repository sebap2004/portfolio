<?php

namespace App\Livewire;

use Livewire\Component;

class AdminHomePage extends Component
{
    public function render()
    {
        return view('livewire.admin-home-page')->layout('components.layout.admin');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class ManageHomePage extends Component
{
    public function render()
    {
        return view('livewire.manage-home-page')->layout('components.layout.settings');
    }
}

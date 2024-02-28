<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewProfile extends Component
{
    public User $user;

    public $songs;

    public function mount(User $user = null)
    {
        $this->user = $user ?? auth()->user();
        $this->songs = $this->user->songs()->get();
    }

    public function render()
    {
        return view('livewire.view-profile')->layout('components.layout.app');
    }
}

<?php

namespace App\Livewire;

use App\Models\Artist;
use App\Models\User;
use Livewire\Component;

class ViewProfile extends Component
{
    public Artist $artist;

    public $songs;

    public function mount()
    {
        $this->songs = $this->artist->songs()->get();
    }

    public function render()
    {
        return view('livewire.view-profile')->layout('components.layout.app');
    }
}

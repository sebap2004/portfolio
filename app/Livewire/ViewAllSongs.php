<?php

namespace App\Livewire;

use App\Models\Song;
use Livewire\Component;

class ViewAllSongs extends Component
{
    public $songs;

    public function mount()
    {
        $this->songs = Song::all();
    }

    public function render()
    {
        return view('livewire.view-all-songs')->layout('components.layout.app');
    }
}

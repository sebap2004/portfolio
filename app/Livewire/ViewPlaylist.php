<?php

namespace App\Livewire;

use App\Models\Playlist;
use Livewire\Component;

class ViewPlaylist extends Component
{
    public Playlist $playlist;

    public $songs;

    public function mount()
    {
        $this->songs = $this->playlist->songs()->with('song')->get()->pluck('song');
    }

    public function render()
    {
        return view('livewire.view-playlist')->layout('components.layout.app');
    }
}

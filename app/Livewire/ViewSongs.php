<?php

namespace App\Livewire;

use App\Models\Album;
use App\Models\Song;
use Livewire\Component;


class ViewSongs extends Component
{
    public $songs;
    public $albums;
    public $search;
    public $hasSearchQuery = false;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->hasSearchQuery = !empty($this->search);
        $this->fetchThings();
    }

    public function render()
    {
        return view('livewire.view-all-songs')->layout('components.layout.app');
    }

    public function fetchThings()
    {
        $this->fetchSongs();
        $this->fetchAlbums();

    }

    public function skibidi()
    {
        $this->dispatch('show-toast', message: "hello there", type: "info");
    }

    private function fetchAlbums()
    {
        $this->albums = Album::query()->when($this->search, function ($query) {
            return $query->where('album_name', 'like', '%' . $this->search . '%');
        })->get();
    }

    private function fetchSongs()
    {
        $this->songs = Song::query()->when($this->search, function ($query) {
            return $query->where('song_name', 'like', '%' . $this->search . '%')
                ->orWhere('artist_name', 'like', '%' . $this->search . '%');
        })->get();
    }
}



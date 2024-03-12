<?php

namespace App\Livewire;

use App\Models\Song;
use Livewire\Component;


class ViewSongs extends Component
{
    public $songs;
    public $search;
    public $hasSearchQuery = false;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->hasSearchQuery = !empty($this->search);
        $this->fetchSongs();
    }

    public function render()
    {
        return view('livewire.view-all-songs')->layout('components.layout.app');
    }

    private function fetchSongs()
    {
        $this->songs = Song::query()->when($this->search, function ($query) {
            return $query->where('song_name', 'like', '%' . $this->search . '%')
                ->orWhere('artist_name', 'like', '%' . $this->search . '%');
        })->get();
    }
}



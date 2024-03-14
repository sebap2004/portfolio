<?php

namespace App\Livewire;

use Livewire\Component;

class SongSearchBar extends Component
{
    public $searchQuery;

    public function search()
    {
        $this->redirectRoute('app', ['search' => $this->searchQuery], navigate: true);
    }


    public function render()
    {
        return view('livewire.song-search-bar');
    }
}

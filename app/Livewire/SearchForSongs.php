<?php

namespace App\Livewire;

use App\Models\Song;
use Livewire\Component;

class SearchForSongs extends Component
{
    public $songs;
    public $query = '';

    public function mount($query = null)
    {
        $this->search = $query;
        $this->songs = Song::query()->when($this->query, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('artist', 'like', '%' . $this->search . '%');
        })->get();
    }

    public function render()
    {
        return view('livewire.search-for-songs')->layout('components.layout.app');
    }
}

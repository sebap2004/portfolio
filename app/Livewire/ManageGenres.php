<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;
use function Symfony\Component\Translation\t;

class ManageGenres extends Component
{
    use WithPagination;


    public $search = "";

    public Genre $currentGenre;

    public $newName;

    public function setGenre(Genre $genre)
    {
        $this->currentGenre = $genre;
        $this->newName = $this->currentGenre->genre_name;
    }

    public function editGenre()
    {
        $this->currentGenre->genre_name = $this->newName;
        $this->currentGenre->save();
        $this->dispatch('edit-completed');
    }

    public function deleteGenre()
    {
        Song::where('genre_ID', $this->currentGenre->genre_ID)->update(['genre_ID' => null]);
        $this->currentGenre->delete();
        $this->dispatch('show-toast', type: 'success', message: 'Genre deleted successfully');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('genre_name', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $query = Genre::query();
        $query = $this->applySearch($query);

        return view('livewire.manage-genres', [
            'genres' => $query->paginate(10),
        ])->layout('components.layout.admin');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminEditSong;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminManageSongs extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";

    public AdminEditSong $form;

    public function deleteSong(Song $song): void
    {
        if ($song->exists) {
            $song->delete();
        }
        $this->dispatch('song-deleted');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function editSong(Song $song)
    {
        $this->form->setSong($song);
        $this->dispatch('start-edit');
    }

    public function finishEdit()
    {
        $this->form->edit();
        $this->dispatch('edit-completed');
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('song_name', 'like', '%'.$this->search.'%')->
        orWhere('artist_name', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $query = Song::query();
        $query = $this->applySearch($query);

        return view('livewire.admin-manage-songs', [
            'songs' => $query-> paginate(10),
        ])->layout('components.layout.admin');
    }
}

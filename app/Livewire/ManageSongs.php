<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminEditSong;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageSongs extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";

    public $query;

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
        return $this->search === '' ? $query : $query->where('song_name', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $user = auth()->user();
        $songs = null;

        if ($user->artist && $user->artist->songs->count() > 0) {
            $query = $user->artist->songs->toQuery();
            $query = $this->applySearch($query);
            $songs = $query->paginate(10);
        }

        return view('livewire.manage-songs', [
            'songs' => $songs,
        ])->layout('components.layout.settings');
    }


}

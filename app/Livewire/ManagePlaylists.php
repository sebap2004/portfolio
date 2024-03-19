<?php

namespace App\Livewire;

use App\Livewire\Forms\ManageAlbumsForm;
use App\Livewire\Forms\ManagePlaylistsForm;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManagePlaylists extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title = "Manage Playlists - Stylus Streaming";
    public $search = "";

    public ManagePlaylistsForm $form;

    public function deletePlaylist(Playlist $playlist): void
    {
        if ($playlist->exists) {
            $playlist->songs()->delete();
            $playlist->delete();
        }
        $this->dispatch('playlist-deleted');
    }


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function editplaylist(Playlist $playlist)
    {
        $this->form->setPlaylist($playlist);
        $this->dispatch('start-edit');
    }

    public function finishEdit()
    {
        $this->form->edit();
        $this->dispatch('edit-completed');
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('playlist_name', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $user = auth()->user();
        $playlists = null;

        if ($user->playlists() && $user->playlists->count() > 0) {
            $query = $user->playlists()->getQuery();
            $query = $this->applySearch($query);
            $playlists = $query->paginate(10);
        }

        return view('livewire.manage-playlists', [
            'playlists' => $playlists
        ])->layout('components.layout.settings');
    }
}

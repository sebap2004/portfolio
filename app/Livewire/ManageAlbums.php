<?php

namespace App\Livewire;

use App\Livewire\Forms\ManageAlbumsForm;
use App\Models\Album;
use App\Models\Artist;
use App\Models\PlaylistSong;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageAlbums extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";

    public ManageAlbumsForm $form;

    public function deleteAlbum(Album $album): void
    {
        if ($album->exists) {
            $songs = $album->songs;
            foreach ($songs as $song) {
                $playlistSongs = PlaylistSong::where('song_ID', $song->song_ID)->get();
                foreach ($playlistSongs as $playlistSong) {
                    $playlistSong->delete();
                }
            }
            $album->songs()->delete();
            $album->delete();
        }
        $this->dispatch('album-deleted');
    }


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function editAlbum(Album $album)
    {
        $this->form->setAlbum($album);
        $this->dispatch('start-edit');
    }

    public function finishEdit()
    {
        $this->form->edit();
        $this->dispatch('edit-completed');
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('album_name', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $user = auth()->user();
        $albums = null;

        if ($user->artist->albums() && $user->artist->albums->count() > 0) {
            $query = $user->artist->albums->toQuery();
            $query = $this->applySearch($query);
            $albums = $query->paginate(10);
        }

        return view('livewire.manage-albums', [
            'albums' => $albums
        ])->layout('components.layout.settings');
    }
}

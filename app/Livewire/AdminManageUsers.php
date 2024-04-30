<?php

namespace App\Livewire;

use App\Livewire\Forms\EditProfileAdmin;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageUsers extends Component
{
    use WithPagination;

    public $search = "";

    public EditProfileAdmin $form;

    public $currentSetUser;

    public function setUserToDelete($user)
    {
        $this->currentSetUser = User::find($user);
    }

    public function userSet($user)
    {
        $this->form->setUser(User::find($user));
    }

    public function editUser()
    {
        $this->form->edit();
        $this->dispatch('user-edited');
    }

    public function deleteUser()
    {
        if ($this->currentSetUser->admin()) {
            DB::table('admin')->where('user_id', $this->currentSetUser->id)->delete();
        }
        $playlists = Playlist::where('user_ID', $this->currentSetUser->id)->get();
        foreach ($playlists as $playlist) {
            $playlist->songs()->delete();
        }
        Playlist::where('user_ID', $this->currentSetUser->id)->delete();
        if ($this->currentSetUser->artist && $this->currentSetUser->artist->songs()) {
            foreach ($this->currentSetUser->artist->songs() as $song)
            {
                if (PlaylistSong::where('song_ID', $song->song_ID))
                {
                    PlaylistSong::where('song_ID', $song->song_ID)->delete();
                }
                $song->delete();
            }
            if ($this->currentSetUser->artist->albums()) {
                $this->currentSetUser->artist->albums()->songs->delete();
                $this->currentSetUser->artist->albums()->delete();
            }
            $this->currentSetUser->artist->songs()->delete();
            $this->currentSetUser->artist->delete();
        }
        $this->currentSetUser->delete();
        $this->dispatch('user-deleted');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('name', 'like', '%' . $this->search . '%')->
        orWhere('username', 'like', '%' . $this->search . '%')->
        orWhere('email', 'like', '%' . $this->search . '%');
    }

    public function render()
    {
        $query = User::query();
        $query = $this->applySearch($query);

        return view('livewire.admin-manage-users', [
            'users' => $query->paginate(10),
        ])->layout('components.layout.admin');
    }
}

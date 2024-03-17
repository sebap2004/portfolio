<?php

namespace App\Livewire;

use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;



class AppSidebar extends Component
{
    public $playlists;

    public function mount()
    {
        $this->refresh();
    }

    public function refresh()
    {
        $this->playlists = auth()->user()->playlists;
    }


    #[Validate(['required'])]
    public $playlist_name;

    public function createPlaylist()
    {
        $this->validate();

        $attributes = $this->all();
        $attributes['user_ID'] = auth()->user()->id;
        $attributes['playlist_slug'] = Str::slug($attributes['playlist_name']);
        Playlist::create($attributes);
        $this->refresh();
        $this->dispatch('playlist-created');
        $this->playlist_name = "";
    }

    public function addSongToPlaylist($playlistID, $song_ID)
    {
        PlaylistSong::create([
            "song_ID" => $song_ID,
            "playlist_ID" => $playlistID
        ]);

        $this->dispatch("added-song");
    }

    public function render()
    {
        return view('livewire.app-sidebar');
    }
}

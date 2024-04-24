<?php

namespace App\Livewire\Forms;

use App\Models\Album;
use App\Models\Playlist;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ManagePlaylistsForm extends Form
{
    use WithFileUploads;

    public Playlist $playlist;

    public $playlist_name;

    public function rules()
    {
        return [
            'playlist_name' => 'required|string|max:30',
        ];
    }

    public function messages()
    {
        return [
            'playlist_name.required' => 'The song name is required.',
        ];
    }


    public function setPlaylist(Playlist $playlist)
    {
        $this->playlist = $playlist;
        $this->playlist_name = $this->playlist->playlist_name;
    }

    public function edit()
    {
        $this->validate();
        $attributes = $this->except('playlist');
        $this->playlist->playlist_name = $attributes['playlist_name'] ?? $this->playlist->playlist_name;
        $this->playlist->save();
    }
}

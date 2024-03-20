<?php

namespace App\Livewire\Forms;

use App\Models\Song;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;


class AdminEditSong extends Form
{
    use WithFileUploads;

    public Song $song;

    public $song_name;
    public $artist_name;
    public $album_ID;
    public $song_directory;
    public $cover_directory;
    public $genre_ID;

    public function rules()
    {
        return [
            'song_name' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'song_directory' => 'nullable|file|mimes:mp3,wav,ogg,flac|max:15360',
            'cover_directory' => 'nullable|image|mimes:jpeg,png,jpg|max:15360',
        ];
    }

    public function messages()
    {
        return [
            'song_name.required' => 'The song name is required.',
            'artist_name.required' => 'The artist name is required.',
            'song_directory.required' => 'Please upload a song file.',
            'song_directory.file' => 'The song file must be a file.',
            'song_directory.mimes' => 'Must be a valid audio type.',
            'song_directory.max' => 'Song file size too large. (Max 15MB)',
            'cover_directory.required' => 'Please upload a cover image.',
            'cover_directory.image' => 'The cover image must be an image file.',
            'cover_directory.mimes' => 'Must be valid image type.',
            'cover_directory.max' => 'Image file size too large. (Max 15MB)',
        ];
    }


    public function setSong(Song $song)
    {
        $this->song = $song;
        $this->song_name = $this->song->song_name;
        $this->artist_name = $this->song->artist_name;
        $this->album_ID = $this->song->album_ID;
        $this->genre_ID = $this->song->genre_ID;
    }

    public function edit()
    {
        $this->validate();

        $attributes = $this->except('song');

        if($this->cover_directory) {
            \Storage::delete($this->song->cover_directory);
            $attributes['cover_directory'] = $this->cover_directory->store('covers');
        }
        else
        {
            unset($attributes['cover_directory']);
        }

        if($this->song_directory) {
            \Storage::delete($this->song->song_directory);
            $attributes['song_directory'] = $this->song_directory->store('songs');
            $this->song->song_directory = $attributes['song_directory'];
        }
        else
        {
            unset($attributes['song_directory']);
        }

        if ($attributes['album_ID'] == 0 || $attributes['album_ID'] == null) {
            $attributes['album_ID'] = null;
        }

        if ($attributes['genre_ID'] == 0 || $attributes['genre_ID'] == null) {
            $attributes['genre_ID'] = null;
        }

        $this->song->genre_ID = $attributes['genre_ID'] ?? null;
        $this->song->album_ID = $attributes['album_ID'] ?? null;
        $this->song->song_name = $attributes['song_name'] ?? $this->song->song_name;
        $this->song->artist_name = $attributes['artist_name'] ?? $this->song->artist_name;
        $this->song->cover_directory = $attributes['cover_directory'] ?? $this->song->cover_directory;

        $this->song->save();
    }
}

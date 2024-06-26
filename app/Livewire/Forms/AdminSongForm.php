<?php

namespace App\Livewire\Forms;

use App\Models\Artist;
use App\Models\Song;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class AdminSongForm extends Form
{
    use WithFileUploads;

    public $song_name;
    public $artist_name;
    public $album_ID;
    public $song_directory;
    public $cover_directory;
    public $artist_ID;

    public function rules()
    {
        return [
            'song_name' => 'required|string|max:255',
            'song_directory' => 'required|file|mimes:mp3,wav,ogg,flac|max:102400', // Adjust allowed file types as needed
            'cover_directory' => 'required|image|mimes:jpeg,png,jpg|max:15360', // Adjust max size and allowed types as needed
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
            'song_directory.max' => 'Song file size too large. (Max 100MB)',
            'cover_directory.required' => 'Please upload a cover image.',
            'cover_directory.image' => 'The cover image must be an image file.',
            'cover_directory.mimes' => 'Must be valid image type.',
            'cover_directory.max' => 'Image file size too large. (Max 15MB)',
        ];
    }

    public function create()
    {
        $this->artist_name = Artist::find($this->artist_ID)->name;
        $this->validate();
        $attributes = $this->all();

        if ($attributes['album_ID'] == 0 || $attributes['album_ID'] == null) {
            unset($attributes['album_ID']);
        }

        $attributes['song_directory'] = $this->song_directory->store('songs');

        if ($this->cover_directory) {
            $attributes['cover_directory'] = $this->cover_directory->store('covers');
        }

        Song::create($attributes);

        return redirect('/app')->with('success', 'Song uploaded');
    }
}

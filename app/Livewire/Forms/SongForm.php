<?php

namespace App\Livewire\Forms;

use App\Models\Song;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class SongForm extends Form
{
    use WithFileUploads;
    public $song_name;
    public $artist_name;

    public $albumName;

    public $song_directory;

    public $cover_directory;

    public function rules()
    {
        return [
            'song_name' => 'required|string|min:1|max:255',
            'artist_name' => 'required|string|max:255',
            'albumName' => 'nullable|string|max:255',
            'song_directory' => 'required|file|mimes:mp3,wav,ogg,flac|max:8192', // Adjust allowed file types as needed
            'cover_directory' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Adjust max size and allowed types as needed
        ];
    }

    public function create()
    {
        $this->artist_name = auth()->user()->name;
        $this->validate();

        $attributes = $this->all();

        // Store song file with the correct extension
        $songExtension = $this->song_directory->getClientOriginalExtension();
        $songName = $attributes['song_name'] . '.' . $songExtension;
        $attributes['song_directory'] = $this->song_directory->storeAs('public/songs', $songName);

        // Store cover image with the correct extension
        if($this->cover_directory)
        {
            $coverExtension = $this->cover_directory->getClientOriginalExtension();
            $coverName = $attributes['song_name'] . '.' . $coverExtension; // Assuming song_name is the name of the song
            $attributes['cover_directory'] = $this->cover_directory->storeAs('public/images', $coverName);
        }
        Song::create($attributes);
        return redirect('/app')->with('success', 'Song uploaded');
    }

}

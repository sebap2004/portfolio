<?php

namespace App\Livewire\Forms;

use App\Models\Song;
use Illuminate\Support\Facades\Storage;
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

    public $user_ID;

    public function rules()
    {
        return [
            'song_name' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'albumName' => 'nullable|string|max:255',
            'song_directory' => 'required|file|mimes:mp3,wav,ogg,flac|max:2048', // Adjust allowed file types as needed
            'cover_directory' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Adjust max size and allowed types as needed
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
            'song_directory.max' => 'Song file size too large. (Max 2MB)',
            'cover_directory.required' => 'Please upload a cover image.',
            'cover_directory.image' => 'The cover image must be an image file.',
            'cover_directory.mimes' => 'Must be valid image type.',
            'cover_directory.max' => 'Image file size too large. (Max 2MB)',
        ];
    }

    public function create()
    {
        $this->artist_name = auth()->user()->name;
        $this->validate();

        $attributes = $this->all();

        $attributes['user_ID'] = auth()->user()->id;

        // Store song file with the correct extension
        $songExtension = $this->song_directory->getClientOriginalExtension();
        $songName = $attributes['song_name'] . '.' . $songExtension;
        $attributes['song_directory'] = $this->song_directory->storeAs(Storage::url('public/songs'), $songName);

        // Store cover image with the correct extension
        if($this->cover_directory)
        {
            $coverExtension = $this->cover_directory->getClientOriginalExtension();
            $coverName = $attributes['song_name'] . '.' . $coverExtension; // Assuming song_name is the name of the song
            $attributes['cover_directory'] = $this->cover_directory->storeAs(Storage::url('public/images'), $coverName);
        }
        Song::create($attributes);
        return redirect('/app')->with('success', 'Song uploaded');
    }

}

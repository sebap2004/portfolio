<?php

namespace App\Livewire\Forms;

use App\Models\Album;
use App\Models\Song;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ManageAlbumsForm extends Form
{
    use WithFileUploads;

    public Album $album;

    public $album_name;
    public $cover_directory;
    public $artist_ID;
    public function rules()
    {
        return [
            'album_name' => 'required|string|max:255',
            'cover_directory' => 'nullable|image|mimes:jpeg,png,jpg|max:15360',
        ];
    }

    public function messages()
    {
        return [
            'album_name.required' => 'The song name is required.',
            'cover_directory.image' => 'The cover image must be an image file.',
            'cover_directory.mimes' => 'Must be valid image type.',
            'cover_directory.max' => 'Image file size too large. (Max 15MB)',
        ];
    }


    public function setAlbum(Album $album)
    {
        $this->album = $album;
        $this->album_name = $this->album->album_name;
    }

    public function edit()
    {
        $this->validate();

        $attributes = $this->except('song');

        if($this->cover_directory) {
            \Storage::delete($this->album->cover_directory);
            $attributes['cover_directory'] = $this->cover_directory->store('covers', 's3');
        }
        else
        {
            unset($attributes['cover_directory']);
        }

        $this->album->album_name = $attributes['album_name'] ?? $this->album->album_name;
        $this->album->cover_directory = $attributes['cover_directory'] ?? $this->album->cover_directory;
        $this->album->artist_ID = $attributes['artist_ID'] ?? $this->album->artist_ID;

        $this->album->save();
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Album;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAlbumForm extends Form
{
   public $album_name;
   public $cover_directory;

    public function rules()
    {
        return [
            'album_name' => 'required|string|max:255',
            'cover_directory' => 'required|image|mimes:jpeg,png,jpg|max:15360', // Adjust max size and allowed types as needed
        ];
    }

    public function messages()
    {
        return [
            'album_name.required' => 'The song name is required.',
            'cover_directory.required' => 'Please upload a cover image.',
            'cover_directory.image' => 'The cover image must be an image file.',
            'cover_directory.mimes' => 'Must be valid image type.',
            'cover_directory.max' => 'Image file size too large. (Max 15MB)',
        ];
    }

    public function create()
    {
        $this->validate();
        $attributes = $this->all();
        $attributes['album_slug'] = Str::slug($this->album_name);
        if($this->cover_directory)
        {
            $attributes['cover_directory'] = $this->cover_directory->store('covers', 's3');
        }

        $attributes['artist_ID'] = auth()->user()->artist->artist_ID;

        Album::create($attributes);
    }
}

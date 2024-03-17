<?php

namespace App\Livewire\Forms;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class EditArtistFormAdmin extends Form
{
    use WithFileUploads;

    public Artist $artist;

    public $name;
    public $username;
    public $pfp_directory;
    public $bio;

    public function rules()
    {
        return [
            'username' => [
                'required',
                Rule::unique('artists')->ignore($this->artist),
                'max:255',
                'min:3',
                'regex:/^\S*$/u',
            ],
            'name' => [
                'required',
                'max:255',
                'min:3',
            ],
            'pfp_directory' => 'nullable|image|mimes:jpeg,png,jpg|max:15360'
        ];
    }


    public function setArtist(Artist $artist)
    {
        $this->artist = $artist;
        $this->name = $this->artist->name;
        $this->username = $this->artist->username;
        $this->bio = $this->artist->bio;
    }

    public function edit()
    {
        $this->validate();

        $attributes = $this->all();

        if($this->pfp_directory) {
            $attributes['pfp_directory'] = $this->pfp_directory->store('profiles', 's3');
        }
        else
        {
            unset($attributes['pfp_directory']);
        }


        $this->artist->name = $attributes['name'] ?? $this->artist->name;
        $this->artist->username = $attributes['username'] ?? $this->artist->username;
        $this->artist->pfp_directory = $attributes['pfp_directory'] ?? $this->artist->pfp_directory;
        $this->artist->bio = $attributes['bio'] ?? $this->artist->bio;
        $this->artist->save();

        if ($this->artist->songs)
        {
            foreach ($this->artist->songs as $song)
            {
                $song->artist_name = $this->artist->name;
                $song->update();
            }
        }
    }
}

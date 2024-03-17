<?php

namespace App\Livewire\Forms;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class NewArtistForm extends Form
{
    use WithFileUploads;

    public $name;
    public $username;
    public $pfp_directory;
    public $bio;


    public function rules()
    {
        return[
            'username' => [
                'required',
                Rule::unique('users'),
                'max:255',
                'min:3',
                'regex:/^\S*$/u',
            ],
            'name' => [
                'required',
                'max:255',
                'min:3',
            ],
            'pfp_directory' => 'image|mimes:jpeg,png,jpg|max:15360',
        ];
    }

    public function messages()
    {
        return [
            'agreesToTOS.required' => 'You must agree to the Terms of Service.',
        ];
    }

    public function store()
    {
        $this->validate();

        $attributes = $this->all();

        if($this->pfp_directory)
        {
            $attributes['pfp_directory'] = $this->pfp_directory->store('profiles', 's3');
        }

        Artist::create($attributes);


        return redirect('/admin')->with('success', 'Successfully created account!');
    }
}

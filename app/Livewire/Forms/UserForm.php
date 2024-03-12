<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class UserForm extends Form
{
    use WithFileUploads;

    public $name;
    public $username;
    public $pfp_directory;
    public $email;
    public $password;
    public $agreesToTOS;

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')
            ],
            'password'=> [
                'required',
                'max:255',
                'min:7'
            ],
            'pfp_directory' => 'image|mimes:jpeg,png,jpg|max:2048',
            'agreesToTOS' => 'required|accepted',
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
            $coverExtension = $this->pfp_directory->getClientOriginalExtension();
            $coverName = $attributes['username'] . '.' . $coverExtension; // Assuming song_name is the name of the song
            $attributes['pfp_directory'] = $this->pfp_directory->storeAs('public/profiles', $coverName);
        }

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/app')->with('success', 'Successfully created account!');
    }
}

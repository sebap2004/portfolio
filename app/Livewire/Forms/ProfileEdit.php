<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProfileEdit extends Form
{
    use WithFileUploads;

    public User $user;

    public $name;
    public $username;
    public $pfp_directory;
    public $bio;
    public $email;
    public $password;

    public function rules()
    {
        return [
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->user),
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
                Rule::unique('users')->ignore($this->user),
            ],
            'password'=> [
                'required',
                'max:255',
                'min:7'
            ],
            'pfp_directory' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }


    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->bio = $this->user->bio;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }

    public function edit()
    {

        $this->validate();

        $attributes = $this->all();

        $user = User::findOrFail($this->user->id);

        if($this->pfp_directory) {
            $attributes['pfp_directory'] = $this->pfp_directory->store('profiles', 'public');
        }
        else
        {
            unset($attributes['pfp_directory']);
        }

        if($this->password) {
            $attributes['password'] = $this->password;
            dd('new password');
        }
        else
        {
            unset($attributes['password']);
        }

        dd($attributes);

        $user->update($attributes);

        return redirect('/profile/' . $user->username)->with('success', 'Successfully updated!');
    }
}

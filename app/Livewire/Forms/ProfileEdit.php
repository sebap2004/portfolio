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
                'nullable',
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
    }

    public function edit()
    {
        $this->validate();

        $attributes = $this->all();

        if($this->pfp_directory) {
            $attributes['pfp_directory'] = $this->pfp_directory->store('profiles', 'public');
        }
        else
        {
            unset($attributes['pfp_directory']);
        }

        if($this->password) {
            $attributes['password'] = $this->password;
            $this->user->password = $attributes['password'];
        }
        else
        {
            unset($attributes['password']);
        }

        $this->user->name = $attributes['name'] ?? $this->user->name;
        $this->user->username = $attributes['username'] ?? $this->user->username;
        $this->user->pfp_directory = $attributes['pfp_directory'] ?? $this->user->pfp_directory;
        $this->user->bio = $attributes['bio'] ?? $this->user->bio;
        $this->user->email = $attributes['email'] ?? $this->user->email;

        $this->user->artist->name = $attributes['name'] ?? $this->user->name;
        $this->user->artist->username = $attributes['$this->username'] ?? $this->user->username;
        $this->user->artist->pfp_directory = $attributes['pfp_directory'] ?? $this->user->pfp_directory;
        $this->user->artist->bio = $attributes['bio'] ?? $this->user->bio;

        $this->user->artist->save();
        $this->user->save();

        if ($this->user->artist->songs)
        {
            foreach ($this->user->artist->songs as $song)
            {
                $song->artist_name = $this->user->artist->name;
                $song->update();
            }
        }

        return redirect('/profile/' . $attributes['username'])->with('success', 'Successfully updated!');
    }
}

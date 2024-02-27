<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $name;
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return[
            'username' => [
                'required',
                Rule::unique('users'),
                'max:255',
                'min:3',
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
            ]
        ];
    }

    public function login($credentials)
    {

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Logged in!');
        }

        return back()
            ->withInput()
            ->withErrors(['username' => 'wrong lol']);
    }

    public function store()
    {
        $this->validate();
        $user = User::create($this->all());
        auth()->login($user);
    }
}

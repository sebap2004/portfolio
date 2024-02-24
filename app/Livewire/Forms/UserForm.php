<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public User $user;

    #[Validate]
    public $name;
    #[Validate]
    public $username;

    #[Validate]
    public $email;

    #[Validate]
    public $password;

    public function mount()
    {
        $this->user = new User();
    }

    public function rules()
    {
        return[
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->user),
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
                Rule::unique('users')->ignore($this->user)
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
        dd($credentials);

        if (auth()->attempt($credentials)) {
            dd('logged in');
            return redirect()->intended('/')->with('success', 'Logged in!');
        }

        dd("unfortunate");
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

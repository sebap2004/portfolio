<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserLogin extends Form
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];


    public function login()
    {
        $this->validate();

        if (auth()->attempt($this->all())) {
            return redirect()->intended('/app')->with('success', 'Logged in!');
        }

        return $this->addError('username', 'Incorrect username and password');
    }
}

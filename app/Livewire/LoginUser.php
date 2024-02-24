<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginUser extends Component
{
    public UserForm $form;

    #[Validate('required')]
    public $username;

    #[Validate('required')]
    public $password;

    public function mount()
    {
        $this->form->mount();
    }

    public function login()
    {

        $this->validate()->except('form');

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        dd('die');

        $this->form->login($credentials);
    }


    public function render()
    {
        return view('livewire.login-user');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Livewire\Forms\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginUser extends Component
{
    public UserLogin $form;

    public function login()
    {
        $this->form->login();
    }

    public function render()
    {
        return view('livewire.login-user')->layout('components.layout.home');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Livewire\store;

class RegisterUser extends Component
{
    public UserForm $form;

    public $formErrors = [];

    public User $user;

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
    public function mount()
    {

    }

    public function register()
    {
        $this->form->store();
        return redirect('/')->with('success', 'Successfully created user!');
    }

    public function render()
    {
        return view('livewire.register-user');
    }
}

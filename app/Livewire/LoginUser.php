<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginUser extends Component
{
    public UserForm $form;

    #[Validate('required')]
    public $username;

    #[Validate('required')]
    public $password;

    public $formErrors = [];

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function mount()
    {
        $this->form->mount();
    }

    public function login()
    {

        $validator = Validator::make(
            [
                'username' => $this->username,
                'password' => $this->password,
            ],
            $this->rules
        );

        if ($validator->fails()) {
            $this->reset('password'); // Reset password field if validation fails
            $this->formErrors = $validator->errors()->all();
            return;
        }

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if (!$user || !Auth::getProvider()->validateCredentials($user, $credentials)) {
            // Invalid credentials
            $this->formErrors = ['Invalid credentials. Please try again.'];
            return;
        }

        $this->form->login($credentials);
    }


    public function render()
    {
        return view('livewire.login-user');
    }
}

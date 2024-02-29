<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Livewire\store;

class RegisterUser extends Component
{
    use WithFileUploads;

    public UserForm $form;


    public User $user;

    public $name;
    public $username;
    public $email;
    public $password;

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

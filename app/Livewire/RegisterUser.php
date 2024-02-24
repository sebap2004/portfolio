<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use function Livewire\store;

class RegisterUser extends Component
{
    public UserForm $form;

    public function mount()
    {
        $this->form->mount();
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

<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileEdit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public User $user;
    public bool $myUser;


    public $name;
    public $username;
    public $pfp_directory;
    public $bio;
    public $email;
    public $password;
    public ProfileEdit $form;


    public function mount(User $user = null)
    {
        $this->user = $user;
        $this->myUser = $user->username === auth()->user()->username;
    }

    public function setUser(User $user)
    {
        $this->form->setUser($user);
    }

    public function edit()
    {
        $this->form->edit();
    }

    public function render()
    {
        if (!$this->myUser)
        {
            $this->redirect('profile/' . auth()->user()->username . '/edit');
        }
        $this->setUser(auth()->user());
        return view('livewire.edit-profile')->layout('components.layout.app');
    }
}

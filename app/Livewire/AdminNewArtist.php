<?php

namespace App\Livewire;

use App\Livewire\Forms\NewArtistForm;
use App\Livewire\Forms\UserForm;
use App\Models\Artist;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminNewArtist extends Component
{
    use WithFileUploads;

    public NewArtistForm $form;

    public Artist $user;

    public function register()
    {
        $this->form->store();
        return redirect('/admin')->with('success', 'Successfully created artist!');
    }

    public function render()
    {
        return view('livewire.admin-new-artist')->layout('components.layout.admin');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\SongForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSong extends Component
{
    use WithFileUploads;

    public SongForm $form;
    public function create()
    {
        $this->form->create();
    }

    public function render()
    {
        return view('livewire.upload-song')->layout('components.layout.app');
    }
}

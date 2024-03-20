<?php

namespace App\Livewire;

use App\Models\Genre;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateGenre extends Component
{
    #[Validate('required')]
    public $genre_name;


    public function create()
    {
        $this->validate();
        $attributes = $this->all();

        Genre::create($attributes);

        return redirect('/admin')->with('success', 'Genre created');
    }

    public function render()
    {
        return view('livewire.create-genre')->layout('components.layout.admin');
    }
}

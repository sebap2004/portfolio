<?php

namespace App\Livewire;

use App\Livewire\Forms\EditArtistFormAdmin;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminManageArtists extends Component
{
    use WithPagination;
    use WithFileUploads;

    public EditArtistFormAdmin $form;

    public $search = "";

    public Artist $setArtist;


    public function artistSet($user)
    {
        $this->form->setArtist(Artist::find($user));
        $this->setArtist = Artist::find($user);

    }

    public function editArtist()
    {
        $this->form->edit();
        $this->dispatch('user-edited');
    }

    public function deleteArtist()
    {
        if ($this->setArtist->songs())
        {
            $this->setArtist->songs()->delete();
        }
        if($this->setArtist->albums())
        {
            $this->setArtist->albums()->delete();
        }
        $this->setArtist->delete();
        $this->dispatch('user-deleted');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('name', 'like', '%' . $this->search . '%');
    }

    public function render()
    {
        $query = Artist::whereNull('user_ID')->getQuery();
        $query = $this->applySearch($query);
        $artists = $query->paginate(10);


        return view('livewire.admin-manage-artists', [
            'artists' => $artists
        ])->layout('components.layout.admin');
    }
}

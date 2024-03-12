<?php

namespace App\Livewire;

use App\Livewire\Forms\EditProfileAdmin;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageUsers extends Component
{
    use WithPagination;
    public $search = "";

    public EditProfileAdmin $form;

    public $currentSetUser;

    public function setUserToDelete($user)
    {
        $this->currentSetUser = User::find($user);
    }

    public function userSet($user)
    {
        $this->form->setUser(User::find($user));
    }

    public function editUser()
    {
        $this->form->edit();
    }

    public function deleteUser()
    {
        if ($this->currentSetUser->admin())
        {
            DB::table('admin')->where('user_id', $this->currentSetUser->id)->delete();
        }
        if ($this->currentSetUser->songs())
        {
            $this->currentSetUser->songs()->delete();
        }
        $this->currentSetUser->delete();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected function applySearch($query)
    {
        return $this->search === '' ? $query : $query->where('name', 'like', '%'.$this->search.'%')->
            orWhere('username', 'like', '%'.$this->search.'%')->
            orWhere('email', 'like', '%'.$this->search.'%');
    }
    public function render()
    {
        $query = User::query();
        $query = $this->applySearch($query);

        return view('livewire.admin-manage-users', [
            'users' => $query->paginate(10),
        ])->layout('components.layout.admin');
    }
}

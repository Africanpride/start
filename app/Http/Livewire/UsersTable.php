<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $selected = [];
    public $message ='Delete';

    public function callFunction()
    {
        $this->message = "You clicked on button";
    }

    public function deleteUser() {

        foreach($this->selected as $user) {
            $user = User::where($user, 'id')->get()->delete();
            // $user->destroy();
        }

    }

    public function mount() {
        $this->search = '';
        $this->users = '';
    }

    public function resetFilters()
    {
        // reset properties to null
        $this->reset(['search', 'users']);
        // $this->search = '';
        // $this->users = '';

    }
    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

}

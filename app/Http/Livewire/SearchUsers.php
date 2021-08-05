<?php

namespace App\Http\Livewire;

use Users;
use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $query, $users = [], $search = '';

    public function mount() {
        $this->query = '';
        $this->users = '';
    }

    public function resetFilters()
    {
        // reset properties to null
        $this->reset(['query', 'users']);

    }

    public function updatedQuery() {
        $this->users = User::where('first_name', 'like', '%' . $this->query . '%' )
        ->orwhere('last_name', 'like', '%' . $this->query . '%' )
        ->orwhere('email', 'like', '%' . $this->query . '%' )
        ->get();
        // ->toArray();

    }


    public function render() {

        return view('livewire.search-users');
    }


}



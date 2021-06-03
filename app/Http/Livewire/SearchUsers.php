<?php

namespace App\Http\Livewire;

use Users;
use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    
    
   
    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::where('first_name',  $this->search)
                            ->orWhere('last_name', $this->search)
                            ->orWhere('email', $this->search)
                            ->get()
        ]);
    }
}


// class SearchUsers extends Component
// {
//     public $search;

//     protected $queryString = ['search'];

//     public function render()
//     {
//         return view('livewire.search-users', [
//             'users' => User::where('first_name', 'like', '%'.$this->search.'%')->get(),
//         ]);
//     }
// }


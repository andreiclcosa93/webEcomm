<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;



class Users extends Component
{
    public $searchName="";
    public $users=Null;

    public function updatedSearchName()
    {
        $this->users=User::where('name', 'Like', "%$this->searchName%")
        ->orderBy('name')
        ->get();
    }

    public function render()
    {
        return view('livewire.admin.users');
    }
}

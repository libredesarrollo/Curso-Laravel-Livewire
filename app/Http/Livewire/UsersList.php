<?php

namespace App\Http\Livewire;

use App\Models\User;
//use Illuminate\View\Component;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{

    use WithPagination;

    //public $users;

    public $name = "";

    protected $queryString = ['name'];

    public function mount()
    {
        //$this->users = User::orderBy('created_at','desc')->paginate(10);
        //$this->name="andres";
    }

    public function render()
    {
        $users = User::orderBy('created_at', 'desc');

        if ($this->name) {
            $users->where('name', 'like', '%' . $this->name . '%')
                ->orWhere('email', 'like', '%' . $this->name . '%');
        }

        $users = $users->paginate(10);

        return view('livewire.users-list', ['users' => $users]); //->layout('layouts.app');
    }

    public function cleanFilter()
    {
        $this->name = "";
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}

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

    public $columns = [
        'id',
        'name',
        'email'
    ];

    public $name = "";
    public $sortColumn = "id";
    public $sortDirection = "asc";

    protected $queryString = ['name'];

    public function mount()
    {
        //$this->users = User::orderBy('created_at','desc')->paginate(10);
        //$this->name="andres";
    }

    public function render()
    {
        $users = User::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->name) {
            $users->where('name', 'like', '%' . $this->name . '%')
                ->orWhere('email', 'like', '%' . $this->name . '%');
        }

        $users = $users->paginate(10);

        return view('livewire.users-list', ['users' => $users]); //->layout('layouts.app');
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
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

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserSave extends Component
{

    use WithFileUploads;

    public $name = "Juan";
    public $userId;

    public $email;
    public $password;

    public $user;

    public $avatar;

    public $msj = "";

    protected $listeners = ['refreshData' => 'cleanData'];

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'avatar' => 'nullable|image|max:1024'
    ];

    public function mount($id = null)
    {
        $this->init($id);
    }

    public function render()
    {
        return view('livewire.user-save');
    }

    public function submit()
    {

        if ($this->user)
            $this->rules['email'] = 'required|email|unique:users,email,' . $this->user->id;

        $this->validate();

        $this->password = Hash::make($this->password);

        if ($this->user) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
            $this->msj = "Usuario actualizado correctamente";
        } else {
            $this->user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
            $this->msj = "Usuario creado correctamente";
            //$this->name = $this->password = $this->email = "";
        }

        $this->emit('userSave', $this->msj);

        //*** carga de archivos en Livewire nativo HTML
        //if ($this->avatar) {
        //$avatarName = time() . '_avatar.' . $this->avatar->getClientOriginalExtension();
        //$this->avatar->storeAs('avatar', $avatarName, 'public_uploads');

        //$this->user->updateProfilePhoto($this->avatar);
        //}

        //return redirect()->route('user.list');
    }

    private function init($id)
    {

        $user = null;
        if ($id) {
            $user = User::findOrFail($id);
            $this->userId = $id;
        }

        $this->user = $user;

        if ($this->user) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            //$this->password = $this->user->password;

        }
    }

    public function cleanData()
    {
        $this->emit('dataSend');
        $this->reset(['name', 'email']);
    }
}

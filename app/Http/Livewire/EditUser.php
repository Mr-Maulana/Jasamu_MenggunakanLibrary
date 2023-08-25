<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $role;
    public $password;

    public function mount($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $this->userId   = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->password = $user->password;
        }
    }


    public function updateUser()
    {
        $this->validate([
            'name'   => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        if ($this->userId) {
            $user = User::find($this->userId);
            if ($user) {
                $user->update([
                    'name'     => $this->name,
                    'email'   => $this->email,
                    'role'   => $this->role,
                    'password'   => $this->password,
                ]);
            }
        }

        $this->alert('success', 'User Berhasil diedit', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Oke',
            'width' => '',
            'timerProgressBar' => true,
            'onConfirmed' => 'confirmed'
        ]);
    }

    protected $listeners = [
        'confirmed'
    ];

    public function confirmed()
    {
        return redirect()->to('/users');
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}

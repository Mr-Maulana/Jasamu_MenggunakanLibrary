<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateUser extends Component
{

    use LivewireAlert;
    public $name;
    public $email;
    public $role;
    public $password;

    public function saveUser()
    {

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => ['required', 'in:ADMIN,USER'],
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        $this->reset(['name', 'email', 'role', 'password']);
        $this->alert('success', 'User Berhasil dibuat', [
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
        return view('livewire.create-user');
    }
}

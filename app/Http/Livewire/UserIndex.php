<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserIndex extends Component
{
    use LivewireAlert;
    use WithPagination;

    public function render()
    {
        $users = User::paginate(8);
        return view('livewire.user-index', compact('users'));
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        $this->alert('error', 'User Berhasil dihapus', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Oke',
            'width' => '',
            'timerProgressBar' => true,
        ]);
    }
}

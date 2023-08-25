<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserRegistrationReport extends Component
{
    public function render()
    {
        $userCount = User::count();

        return view('livewire.user-registration-report', compact('userCount'));
    }
}

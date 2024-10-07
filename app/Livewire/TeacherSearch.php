<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TeacherSearch extends Component
{
    public $search;
    public function render()
    {
        $users = [];
        if (strlen($this->search) >= 3) {
            $users = User::where('role', '!=', 'admin')->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })->get();
        }

        return view('livewire.teacher-search', ['users' => $users]);
    }
}

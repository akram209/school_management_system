<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ParentSearch extends Component
{
    public $search;
    public function render()
    {
        $users = [];
        if (strlen($this->search) >= 3) {
            $users = User::where('role', 'teacher')->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })->get();
        }

        return view('livewire.parent-search', ['users' => $users]);
    }
}

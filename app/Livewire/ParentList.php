<?php

namespace App\Livewire;

use App\Models\ParentModel;
use Livewire\Component;

class ParentList extends Component
{
    public $search = '';



    public function render()
    {
        $parents = ParentModel::with(['user'])->whereHas('user', function ($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%');
        })->paginate(20);

        return view('livewire.parent-list', ['parents' => $parents]);
    }
}

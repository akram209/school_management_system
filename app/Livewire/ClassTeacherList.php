<?php

namespace App\Livewire;

use App\Models\ClassModel;
use Livewire\Component;

class ClassTeacherList extends Component
{
    public $classId;
    public $search;
    public function mount($classId)
    {
        $this->classId = $classId;
    }
    public function render()
    {
        $class = ClassModel::find($this->classId);
        $teachers = $class->teachers()
            ->whereHas('user', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.class-teacher-list', ['teachers' => $teachers]);
    }
}

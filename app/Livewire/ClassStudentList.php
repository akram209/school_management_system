<?php

namespace App\Livewire;

use App\Models\ClassModel;
use Livewire\Component;

class ClassStudentList extends Component
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
        $students = $class->students()
            ->whereHas('user', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->get();
        return view('livewire.class-student-list',['students'=>$students]);
    }
}

<?php

namespace App\Livewire;

use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClassTeacherSubject extends Component
{
    public $classes;
    public $teachers = [];
    public $day_name;
    public $selectedClass;
    public $selectedTeacher;
    public $selectedSubject = null;
    public $start_time;
    public $end_time;

    public function mount()
    {
        // Load all classes on component mount
        $this->classes = ClassModel::all();
    }



    public function create()
    {
        $this->validate([
            'selectedClass' => 'required',
            'selectedTeacher' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);
        $this->selectedSubject = DB::table('subjects')
            ->join('class_subject_teacher', 'subjects.id', '=', 'class_subject_teacher.subject_id')
            ->where('class_subject_teacher.teacher_id', $this->selectedTeacher)
            ->where('class_subject_teacher.class_id', $this->selectedClass)
            ->select('subjects.*')
            ->get();
        Timetable::create([
            'class_id' => $this->selectedClass,
            'teacher_id' => $this->selectedTeacher,
            'subject_id' => $this->selectedSubject->first()->id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time
        ]);

        $this->reset('selectedClass', 'selectedTeacher', 'selectedSubject');
        return redirect()->back()->with('success', 'Timetable created successfully');
    }


    public function render()
    {
        if ($this->selectedClass) {
            $this->teachers = Teacher::whereHas('classes', function ($query) {
                $query->where('class_id', $this->selectedClass);
            })->with('user')->get();
        }

        // Load subjects based on selected class and teacher


        return view('livewire.class-teacher-subject', [
            'teachers' => $this->teachers,
        ]);
    }
}

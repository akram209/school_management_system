<?php

namespace App\Livewire;

use App\Models\Attendence;
use App\Models\ClassModel;
use App\Models\Teacher;
use Livewire\Component;

class TakeAttendence extends Component
{
    public $class_id;
    public $teacher;
    public $date;



    public function mount($class, $teacher)
    {
        $this->class_id = $class->id;
        $this->teacher = $teacher;
        $this->date = date('Y-m-d');
    }

    public function updateAttendence($studentId)
    {

        $attendence = Attendence::where('student_id', $studentId)->where('date', $this->date)->first();
        if ($attendence) {
            $status = $attendence->status;
            if ($status == 'present') {
                $attendence->update([
                    'status' => 'absent',
                ]);
            } elseif ($status == 'absent') {
                $attendence->update([
                    'status' => 'present',
                ]);
            }
        } else {
            Attendence::create([
                'student_id' => $studentId,
                'date' => $this->date,
                'status' => 'present',
            ]);
        }
    }
    public function render()
    {

        $teacherClasses = Teacher::with('classes')->where('id', $this->teacher->id)->first();
        $classes = $teacherClasses->classes;
        $class = ClassModel::with(['students.user', 'students.attendence' => function ($query) {
            $query->where('date', $this->date);  // Filter by today's date
        }])->find($this->class_id);

        $students = $class->students;
        return view('livewire.take-attendence', [

            'students' => $students,
            'classes' => $classes,
        ]);
    }
}

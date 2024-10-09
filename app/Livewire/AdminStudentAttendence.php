<?php

namespace App\Livewire;

use App\Models\Attendence;
use App\Models\ClassModel;
use Livewire\Component;

class AdminStudentAttendence extends Component
{
    public $date;

    public $class_id;






    public function mount()
    {

        $this->date = date('Y-m-d');
        $this->class_id = ClassModel::first()->id;
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

        $classes = ClassModel::with('students')->get();

        $class = ClassModel::with(['students.user', 'students.attendence' => function ($query) {
            $query->where('date', $this->date);  // Filter by today's date
        }])->find($this->class_id);

        $students = $class->students;
        return view('livewire.admin-student-attendence', [

            'students' => $students,
            'classes' => $classes,
        ]);
    }
}

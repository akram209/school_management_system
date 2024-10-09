<?php

namespace App\Livewire;

use App\Models\Attendence;
use App\Models\Teacher;
use App\Models\TeacherAttendence;
use Livewire\Component;

class AdminTeacherAttendence extends Component
{
    public $date;







    public function mount()
    {

        $this->date = date('Y-m-d');
    }

    public function updateAttendence($teacherId)
    {

        $attendence = TeacherAttendence::where('teacher_id', $teacherId)->where('date', $this->date)->first();
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
            TeacherAttendence::create([
                'teacher_id' => $teacherId,
                'date' => $this->date,
                'status' => 'present',
            ]);
        }
    }
    public function render()
    {
        $teachers = Teacher::with(['teacherAttendences' => function ($query) {
            $query->where('date', $this->date);
        }])->get();

        return view('livewire.admin-teacher-attendence', [

            'teachers' => $teachers,
        ]);
    }
}

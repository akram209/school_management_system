<?php

namespace App\Livewire;

use App\Models\Fee;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{

    public $search = '';


    public function updateFee($studentId)
    {



        $fee = Fee::where('student_id', $studentId)->first();
        if ($fee) {
            $status = $fee->status;
            if ($status == 'paid') {
                $fee->update([
                    'status' => 'unpaid',
                ]);
            } elseif ($status == 'unpaid') {
                $fee->update([
                    'status' => 'paid',
                ]);
            }
        } else {
            Fee::create([
                'student_id' => $studentId,
                'status' => 'paid',
            ]);
        }
    }
    public function render()
    {
        $students = Student::with(['user', 'class', 'fee'])->whereHas('user', function ($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%');
        })->paginate(20);

        return view('livewire.student-list', ['students' => $students]);
    }
}

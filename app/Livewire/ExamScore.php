<?php

namespace App\Livewire;

use App\Models\Exam;
use Livewire\Component;

class ExamScore extends Component
{
    public $scores = [];
    public $exam;
    public $search;
    public function mount($exam_id)
    {

        $this->exam = Exam::find($exam_id);
        $this->scores = $this->exam->students()->pluck('exam_student.score', 'students.id')->toArray();
    }

    public function updateScore($student_id)
    {
        // Access the score from the dynamically bound score array
        if (isset($this->scores[$student_id])) {
            $score = $this->scores[$student_id];

            // Update the pivot table with the new score
            $this->exam->students()->updateExistingPivot($student_id, ['score' => $score]);
        }
    }


    public function render()
    {
        $exam = $this->exam->load('students');
        $students = $exam->students()
            ->whereHas('user', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.exam-score', ['students' => $students, 'exam' => $exam]);
    }
}

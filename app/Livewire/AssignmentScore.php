<?php

namespace App\Livewire;

use App\Models\Assignment;
use Livewire\Component;

class AssignmentScore extends Component
{
    public $scores = [];
    public $assignment;
    public $search;
    public function mount($assignment_id)
    {

        $this->assignment = Assignment::find($assignment_id);
        $this->scores = $this->assignment->students()->pluck('assignment_student.score', 'students.id')->toArray();
    }

    public function updateScore($student_id)
    {
        // Access the score from the dynamically bound score array
        if (isset($this->scores[$student_id])) {
            $score = $this->scores[$student_id];

            // Update the pivot table with the new score
            $this->assignment->students()->updateExistingPivot($student_id, ['score' => $score]);
        }
    }


    public function render()
    {
        $assignment = $this->assignment->load('students');
        $students = $assignment->students()
            ->whereHas('user', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.assignment-score', ['students' => $students, 'assignment' => $assignment]);
    }
}

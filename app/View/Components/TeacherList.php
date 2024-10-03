<?php

namespace App\View\Components;

use App\Jobs\Assignmentjob;
use App\Jobs\ExamJob;
use App\Models\Teacher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeacherList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $userId)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $teacher = Teacher::with(['user', 'subjects', 'classes'])->where('user_id', $this->userId)->first();
        return view('components.teacher-list', compact('teacher'));
    }
}

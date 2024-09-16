<?php

namespace App\View\Components;

use App\Models\Student;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentList extends Component
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
        $student = Student::with(['user', 'class', 'fee'])->where('user_id', $this->userId)->first();
        return view('components.student-list', compact('student'));
    }
}

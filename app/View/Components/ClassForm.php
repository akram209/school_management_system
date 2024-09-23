<?php

namespace App\View\Components;

use App\Models\ClassModel;
use App\Models\Student;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClassForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public  $studentId)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $classes = ClassModel::all();

        return view('components.class-form', ['classes' => $classes], ['student_id' => $this->studentId]);
    }
}

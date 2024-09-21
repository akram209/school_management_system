<?php

namespace App\View\Components;

use App\Models\ClassModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClassForm extends Component
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
        $classes = ClassModel::all();
        return view('components.class-form', ['classes' => $classes], ['userId' => $this->userId]);
    }
}

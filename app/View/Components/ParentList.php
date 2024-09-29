<?php

namespace App\View\Components;

use App\Models\ParentModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ParentList extends Component
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
        $parent = ParentModel::with(['user', 'students.user'])->where('user_id', $this->userId)->first();
        return view('components.parent-list', compact('parent'));
    }
}

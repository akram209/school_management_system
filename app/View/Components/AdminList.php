<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminList extends Component
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
        $admin = User::where('id', $this->userId)->get();
        return view('components.admin-list', compact('admin'));
    }
}

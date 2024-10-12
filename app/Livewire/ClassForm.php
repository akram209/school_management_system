<?php

namespace App\Livewire;

use App\Models\ClassModel;
use Livewire\Attributes\On;
use Livewire\Component;

class ClassForm extends Component
{
    public $name;
    #[On('class-event')]
    public function listenClassEvent() {}
    public function CreateClass()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:30', 'min:3', 'unique:classes,name', 'in:1st,2nd,3rd,4th,5th,6th,7th,8th,9th,10th,11th,12th'],
        ]);
        $class = ClassModel::create([
            'name' => $this->name,
        ]);
        $this->dispatch('class-event', class: $class);


        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.class-form');
    }
}

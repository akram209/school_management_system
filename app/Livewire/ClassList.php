<?php

namespace App\Livewire;

use App\Models\ClassModel;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ClassList extends Component
{
    #[Rule('required', 'string', 'max:30', 'min:3', 'unique:classes,name', 'in:1st,2nd,3rd,4th,5th,6th,7th,8th,9th,10th,11th,12th')]
    public $class_name;


    public $edit_id;
    public function delete($class_id)
    {
        $class = ClassModel::find($class_id);
        $class->delete();
    }
    public function edit(ClassModel $class)
    {

        $this->class_name = $class->name;
        $this->edit_id = $class->id;
    }
    public function update(ClassModel $class)
    {
        $this->validate();


        $class->update([
            'name' => $this->class_name,
        ]);
        $this->reset('class_name',  'edit_id');
    }

    public function cancel()
    {
        $this->reset('class_name', 'edit_id');
    }
    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.class-list', ['classes' => $classes]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SubjectList extends Component
{
    #[On('subject-event')]
    public function listenSubjectEvent() {}

    #[Rule('required', 'string', 'max:30', 'min:3', 'unique:classes,name', 'in:1st,2nd,3rd,4th,5th,6th,7th,8th,9th,10th,11th,12th')]
    public $subject_name;



    public $edit_id;
    public function delete($subject_id)
    {
        $subject = Subject::find($subject_id);
        $subject->exams()->delete();
        $subject->assignments()->delete();
        $subject->delete();
    }
    public function edit(Subject $subject)
    {

        $this->subject_name = $subject->name;
        $this->edit_id = $subject->id;
    }
    public function update(Subject $subject)
    {
        $this->validate();


        $subject->update([
            'name' => $this->subject_name,
        ]);
        $this->reset('subject_name',  'edit_id');
    }

    public function cancel()
    {
        $this->reset('subject_name', 'edit_id');
    }
    public function render()
    {
        $subjects = Subject::all();
        return view('livewire.subject-list', ['subjects' => $subjects]);
    }
}

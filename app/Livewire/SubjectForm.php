<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Attributes\On;
use Livewire\Component;

class SubjectForm extends Component
{
    public $name;
    public $description;

    public function CreateSubject()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:30', 'min:3', 'in:English,Maths,Physics,Chemistry,Biology,Geography,Science'],
            'description' => ['required', 'string', 'max:50', 'min:3'],
        ]);

        $subject = Subject::create([
            'name' => $this->name,
            'description' => $this->description
        ]);
        $this->dispatch('subject-event', subject: $subject);


        $this->reset('name', 'description');
    }

    public function render()
    {
        return view('livewire.subject-form');
    }
}

<?php

namespace App\Jobs;

use App\Models\Assignment;
use App\Models\ClassModel;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Assignmentjob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $classId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $class = ClassModel::with('students')->find($this->classId);
        $students = $class->students;
        $assignments = Assignment::where('class_id', $this->classId)->get();
        foreach ($assignments as $assignment) {

            if ($assignment->students->count() == 0) {
                foreach ($students as $student) {
                    // Attach only if the combination doesn't already exist
                    $assignment->students()->sync($student->id);
                }
            }
        }
    }
}

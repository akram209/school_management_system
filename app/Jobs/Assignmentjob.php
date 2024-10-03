<?php

namespace App\Jobs;

use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Assignmentjob implements ShouldQueue
{
    use Queueable;
    public $timeout = 120;
    /**
     * Create a new job instance.
     */
    public function __construct(public $classId, public $assignmentId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $students = Student::where('class_id', $this->classId)->get();


        foreach ($students as $student) {
            $student->assignments()->syncWithoutDetaching($this->assignmentId, [
                'score' => 0,
                'path' => null,
            ]);
        }
    }
}

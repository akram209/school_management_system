<?php

namespace App\Jobs;

use App\Models\ClassModel;
use App\Models\Exam;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class ExamJob implements ShouldQueue
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
        $exams = Exam::where('class_id', $this->classId)->get();
        foreach ($exams as $exam) {
            if (Carbon::parse($exam->date)->lt(now())) {
                if ($exam->students->count() == 0) {
                    foreach ($students as $student) {
                        // Attach only if the combination doesn't already exist
                        $exam->students()->sync($student->id);
                    }
                }
            }
        }
    }
}

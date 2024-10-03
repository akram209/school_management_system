<?php

namespace App\Jobs;

use App\Models\ClassModel;
use App\Models\Exam;
use App\Models\Student;
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
    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct(public $classId, public $examId)
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
            $student->exams()->syncWithoutDetaching($this->examId, [
                'score' => 0,
            ]);
        }
    }
}

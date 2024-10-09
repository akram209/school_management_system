<?php

namespace App\Jobs;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateTeacherPaymentStatus implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $currentDay = Carbon::now()->day;

        if ($currentDay == 10) {
            // Set all teachers' status to 'paid'
            Teacher::query()->update(['status' => 'paid']);
        } elseif ($currentDay == 25) {
            // Set all teachers' status to 'unpaid'
            Teacher::query()->update(['status' => 'unpaid']);
        }
    }
}

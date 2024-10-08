<?php

namespace App\Jobs;

use App\Mail\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $email, public $type, public $title, public $body)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $details = [
            'type' => $this->type,
            'title' => $this->title,
            'body' => $this->body,
        ];

        Mail::to($this->email)->send(new Notification($details));
    }
}

<?php

namespace App\Jobs;

use App\Models\Permission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPermission as MailSendPermission;


class PermissionJob implements ShouldQueue
{

    use Queueable;

    public $timeout = 240;

    /**
     * Create a new job instance.
     */
    public function __construct(public $permission_id)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $permission = Permission::find($this->permission_id);
        $email = $permission->email;
        $code = $permission->code;
        $details = [
            'title' => 'Permission',
            'body' => 'You have been granted permission to enroll',
            'code' => $code,
        ];

        Mail::to($email)->send(new MailSendPermission($details));
    }
}

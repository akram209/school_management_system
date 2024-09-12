<?php

namespace App\Console\Commands;

use App\Mail\SendPermission as MailSendPermission;
use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:permission {email} {--update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send permission for enrollment';
    private $url;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $code = $this->generateRandomCode();
        $email = $this->argument('email');
        $permission = Permission::where('email', $email)->first();


        if (!$this->option('update')) {
            if ($permission) {
                $this->error('Permission already exists');
                return;
            } else {
                Permission::create([
                    'email' => $email,
                    'code' => $code,
                    'type' => 'student',
                ]);
                $this->info('Permission sent successfully');
            }
        } else {
            $permission->update([
                'type' => 'student',
                'code' => $code
            ]);
            $this->info('Permission updated successfully');
        }

        $details = [
            'title' => 'Permission',
            'body' => 'You have been granted permission to enroll',
            'code' => $code,
        ];

        Mail::to($email)->send(new MailSendPermission($details));
    }
    public function generateRandomCode()
    {
        // Define the characters to use in the code
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        // Get the length of the characters string
        $charactersLength = strlen($characters);

        // Initialize an empty string for the code
        $randomCode = '';

        // Loop to generate each character of the code
        for ($i = 0; $i < 6; $i++) {
            // Pick a random character from the string
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomCode;
    }
}

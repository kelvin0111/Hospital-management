<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\DoctorEmailVerificationMail;
use Illuminate\Support\Facades\Mail;
class SendDoctorVerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public $verificationLink;

    public function __construct($user, $verificationLink)
    {
        $this->user = $user;
        $this->verificationLink = $verificationLink;
    }

    public function handle()
    {
        Mail::to($this->user->email)
            ->send(new DoctorEmailVerificationMail($this->verificationLink));
    }
}

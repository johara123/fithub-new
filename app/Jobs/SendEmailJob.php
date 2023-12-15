<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCustomerMail;

class SendEmailJob implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $name, $email, $randomno;

    /**
     * Create a new job instance.
     */
    public function __construct($custname, $email_address, $randid) {
        $this->name = $custname;
        $this->email = $email_address;
        $this->randomno = $randid;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        //
        $email = new SendCustomerMail($this->name, $this->randomno);
        Mail::to($this->email)->send($email);
    }

}

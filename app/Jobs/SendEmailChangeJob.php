<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCustomerMailUpdate;

class SendEmailChangeJob implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $name, $oldemail, $newemail;

    /**
     * Create a new job instance.
     */
    public function __construct($custname, $oldemail, $newemail) {
        $this->name = $custname;
        $this->oldemail = $oldemail;
        $this->newemail = $newemail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        //
        $email = new SendCustomerMailUpdate($this->name, $this->oldemail, $this->newemail);
        Mail::to($this->newemail)->send($email);
    }

}

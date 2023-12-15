<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactusMail;

class SendContactEmailJob implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $mailbox;

    /**
     * Create a new job instance.
     */
    public function __construct($mailbox) {
        $this->mailbox = $mailbox;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        //
        $email = new SendContactusMail($this->mailbox);
        Mail::to('miltonk875@gmail.com')->send($email);
    }

}

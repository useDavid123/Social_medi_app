<?php

namespace App\Mail;
use App\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Verify extends Mailable
{
    use Queueable, SerializesModels;
    public  $log;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Log $log)
    {
        //
        $this->log=$log;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('clean.mail');
    }
}

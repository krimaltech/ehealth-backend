<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BecomeAnRelationManager extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $refer_as_ro;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($refer_as_ro)
    {
        $this->refer_as_ro = $refer_as_ro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.relation_manager');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ReferFriends extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $refer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($refer)
    {
        $this->refer = $refer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.refer-a-friend');
    }
}

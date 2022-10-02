<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verified_account extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $code;
    public function __construct($code)
    {

        $this->code=$code;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code=$this->code;
        return $this->view("api/user/verified_email",compact("code"));
    }
}

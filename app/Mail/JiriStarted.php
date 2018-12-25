<?php

namespace Jiri\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Jiri\Jiri;
use Jiri\User;

class JiriStarted extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $jiri;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Jiri $jiri)
    {
        $this->user = $user;
        $this->jiri = $jiri;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.jiriStarted',['jiri' => $this->jiri, 'user'=> $this->user]);
    }
}

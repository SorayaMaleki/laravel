<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email)
    {
        $this->name=$name;
        $this->email=$email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->name);
        return $this->view('mail.emailview')
            ->subject("ایمیل تستی لاراول")
            ->to($this->email,$this->name)
            ->replyTo("sorayamaleki08@gmail.com", "soraya")
            ->with([
                'name' => $this->name,
                "date" => date('Y/m/d')
            ]);
    }
}

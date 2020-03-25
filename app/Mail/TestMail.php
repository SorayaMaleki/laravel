<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
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
        return $this->view('mail.emailview')
            ->subject("ایمیل تستی لاراول")
            ->to($this->email,$this->name)
            ->replyTo("sorayamaleki08@gmail.com","soraya")
//            file in storage/app/public
            ->attach(storage_path('app/public/file.txt'),[
                'as'=>"foo.txt",
                "mime"=>"application/json"
            ])
            ->attach(storage_path('app/public/august-1__800_800.jpg'),[
                'as'=>'foo.jpg'
            ])
            ->with([
                'name'=>$this->name,
                "date"=>date('Y/m/d')
            ]);
    }
}

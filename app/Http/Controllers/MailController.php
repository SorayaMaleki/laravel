<?php

namespace App\Http\Controllers;

use App\Mail\MarkdownMail;
use App\Mail\TestMail;
use App\Mail\UserMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use function GuzzleHttp\Promise\all;

class MailController extends Controller
{
    public function index1()
    {
        $data = ["name" => "ثریا ملکی"];
        \Mail::send(['html' => 'mail.emailview'], $data, function (Message $message) {
            $message
//                ->from("sorayamaleki08@gmail.com","soraya") //set in env
                ->to("sorayamaleki08@gmail.com", "maleki")
                ->subject("test email");
        });
        dd("email sent");
    }

    public function index()
    {

        /** use email class */
        /** php artisan make:mail TestMail */
        /** can use Temp email site */

        $name = "ثریا ملکی";
        $email = "sorayamaleki08@gmail.com";
        \Mail::send(new TestMail($name, $email));
        dd("email sent");
    }

    public function showmail()
    {
        $name = "ثریا ملکی";
        $email = "sorayamaleki08@gmail.com";
        return new TestMail($name, $email);

    }

    public function sendmailtouser()
    {
//        $user = User:: find(4);
//        \Mail::to($user)->send(new UserMail());

        $name = ['myoneemail', 'myother', 'myother2'];
        $emails = ['sorayamaleki8@yahoo.com', 'sorayamaleki08@gmail.com', 'masovij877@x7mail.com'];
        \Mail::send(new UserMail($name, $emails));
        dd("email ersal shod");
    }
    public function markdown(){
        /** php artisan make:mail MarkdownMail --markdown=mail.markdown */
        return new MarkdownMail();

        /** to cane markdown must publish it from vendor */
        /** php artisan vendor:publish --tag=laravel-mail */
    }
}

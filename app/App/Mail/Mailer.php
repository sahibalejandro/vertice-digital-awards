<?php namespace App\Mail;

use Mail;

class Mailer
{

    protected function send($view, $data, $email, $subject)
    {
        Mail::send($view, $data, function ($message) use ($email, $subject)
        {
            $message->to($email)->subject($subject);
        });
    }

}

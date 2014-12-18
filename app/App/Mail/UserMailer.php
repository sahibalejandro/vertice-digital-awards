<?php namespace App\Mail;

use App\Models\User;

class UserMailer extends Mailer
{
    public function sendAccessLink(User $user)
    {
        $this->send('emails.auth.access-link', ['user' => $user], $user->email, 'Participa ya en Vértice Digital Awards 2014!');
    }

    public function sendDeserter(User $user)
    {
        $this->send('emails.deserter', ['user' => $user], $user->email, '¡Solo faltas tú!');
    }
}

<?php

class User2
{

    public $first_name;
    public $surname;
    public $email;
    protected $mailer; // Mailer object

    /* Inject dependency */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    public function notify($message)
    {
        /* Hard-coded dependency */
        // $mailer = new Mailer();

        // return $mailer->sendMessage($this->email, $message);
        return $this->mailer->sendMessage($this->email, $message);
    }
}

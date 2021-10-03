<?php

class User
{
    /**
     * First name
     * @var string
     */
    public $first_name;

    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    /**
     * Get the user's full name from their name and surname
     * 
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /* 21. Dependency injection: inject objects that a class depends on */

    /**
     * Set the mailer dependency via "setter"
     * 
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * 
     * @return boolean True if sent, false otherwise
     */
    public function notify($message)
    {
        // /* Step 1: Dependency is hard coded */
        // $mailer = new Mailer();
        // return $mailer->sendMessage($this->email, $message);

        /* Step 2: Dependency is hard coded */
        return $this->mailer->sendMessage($this->email, $message);
    }
}

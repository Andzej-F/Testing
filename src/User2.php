<?php

class User2
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
     * mailer object
     * @var Mailer
     */

    protected $mailer; // Mailer object

    /**
     * Set the mailer dependency
     * 
     * @param Mailer $mailer The mailer object
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Get the users's full name from their first name and surname
     * 
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * 
     * @return boolean true if sent, false otherwise
     */
    public function notify($message)
    {
        /* Hard-coded dependency */
        // $mailer = new Mailer();

        // return $mailer->sendMessage($this->email, $message);
        return $this->mailer->sendMessage($this->email, $message);
    }
}

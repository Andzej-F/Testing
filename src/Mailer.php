<?php

/**
 * Mailer
 * 
 * Send a message
 */
class Mailer
{
    /**
     * Send a message
     * 
     * @param string $email The email address
     * @param string $mesage The message
     * 
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        //Use mail() or PHPMailer for example
        sleep(1);

        echo "send '$message' to '$email'";

        return true;
    }
}

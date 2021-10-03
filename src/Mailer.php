<?php

/**
 * Mailer
 * 
 * Send message
 */
class Mailer
{
    /**
     * Send a message
     * 
     * @param string $email The email address
     * @param string $message The message
     * 
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        /* Modification: 1 */
        // // Use mail() or PHPMailer for example
        // sleep(3);

        // echo "\n send '$message' to '$email'";

        // return true;


        /* Modification 2: */
        if (empty($email)) {
            throw new Exception();
        }

        // Use mail() or PHPMailer for example
        sleep(3);

        echo "\n send '$message' to '$email'";

        return true;
    }
}

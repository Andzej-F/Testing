<?php

declare(strict_types=1);

use PhpParser\Node\Expr\FuncCall;

class Mailer
{
    public function sendMessage($email, $message)
    {
        if (empty($email)) {
            throw new Exception;
        }

        sleep(1);

        echo 'send ' . $message . ' to ' . $email;

        return true;
    }
}

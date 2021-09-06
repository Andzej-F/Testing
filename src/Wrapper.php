<?php

class Wrapper
{
    public function wrap($text, $lineLength)
    {
        if (strlen($text) > $lineLength) {
            $au
                = substr($text, 0, $lineLength) . "\n" .
                substr($text, $lineLength);
            // echo "spaudina\n" . $au . "\n";
            // echo "spaudina\nalong\nword";
            return $au;
        }
        return $text;
    }
}

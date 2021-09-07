<?php

class Wrapper
{
    // public function wrap($text, $lineLength)
    // {
    //     if (strlen($text) > $lineLength) {
    //         return substr($text, 0, $lineLength) . "\n" .
    //             $this->wrap(substr($text, $lineLength), $lineLength);
    //         // echo "spausdina: " . $au . "\n\n";
    //         // echo "spaudina\nalong\nword";
    //         // return $au;
    //     }
    //     return $text;
    // }

    public function wrap($text, $lineLength)
    {
        while (strlen($text) > $lineLength) {
            $text = substr($text, 0, $lineLength);
            echo $text;
            // $this->wrap(substr($text, $lineLength), $lineLength);

        }
        return $text;
    }
}

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

    // public function wrap($text, $lineLength)
    // {
    //     while (strlen($text) > $lineLength) {
    //         $text = substr($text, 0, $lineLength);
    //         echo $text;
    //         // $this->wrap(substr($text, $lineLength), $lineLength);

    //     }
    //     return $text;
    // }

    public function wrap($text, $lineLength): string
    {
        $convertedText = '';
        $remainder = $text;
        while (strlen($remainder) > $lineLength) {
            /* Check if empty space is after the word */
            if (substr($remainder, $lineLength - 1, 1) == " ") {
                $firstPart = substr($remainder, 0, $lineLength - 1); //'dicti'
            } else {
                $firstPart = substr($remainder, 0, $lineLength); //'dicti'
            }

            /* Check if a word has an empty space inside */
            $wordLength = strlen($firstPart);
            $spacePosition = strpos($firstPart, ' ');
            echo $spacePosition;
            if ($spacePosition < $wordLength) {
                $firstPart = substr($remainder, 0, $spacePosition); //'dicti'
            }

            $remainder = substr($remainder, $lineLength); //'onaries'
            $convertedText .= $firstPart . "\n";
        }
        $convertedText .= $remainder;
        return $convertedText;
    }
}

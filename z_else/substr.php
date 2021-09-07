<?php

// $rest1 = substr('abcdef', -1);
// echo $rest1 . "\n";

// $rest2 = substr('abcdef', -2);
// echo $rest2 . "\n";

// $rest3 = substr('abcdef', -9, 4);
// echo $rest3 . "\n";

// $rest = substr("abcdef", 4, -4);  // returns "cde"

// var_dump(substr('a', 2)); // bool(false)
// var_dump($rest);
// if ($rest == true) {
//     echo "returns true\n";
// }
// if ($rest == false) {
//     echo "returns false\n";
// }

// echo substr('dictionary', 5);

function wrap($text, $lineLength)
{
    $array = [];
    while (strlen($text) > $lineLength) {
        $firstPart = substr($text, 0, $lineLength);
        $text = substr($text, $lineLength);
        $array[] = $firstPart;
        return $text;
        // i masyva
        // echo $firstPart . '<br>';
        // echo 'Cia remainderis ' . $text . '<br>';
    }
    // grazinti masyva paversta stringu
    return $text;
}

echo wrap('dictionarys', 5);

// function wrap($text, $lineLength)
// {
//     if (strlen($text) > $lineLength) {
//         return substr($text, 0, $lineLength) . "<br>" .
//             wrap(substr($text, $lineLength), $lineLength);
//     }
//     return $text;
// }

// echo wrap('dictionarys', 5);

<?php

echo wrap('word word', 5);

function wrap($text, $lineLength): string
{
    $convertedText = '';
    $remainder = $text;
    while (strlen($remainder) > $lineLength) {
        /* Check if word end with an empty space */
        if (substr($remainder, $lineLength - 1, 1) == " ") {
            $firstPart = substr($remainder, 0, $lineLength - 1); //'dicti'
            echo $firstPart . '<hr>';
        } else {
            $firstPart = substr($remainder, 0, $lineLength); //'dicti'
        }
        $remainder = substr($remainder, $lineLength); //'onaries'
        $convertedText .= $firstPart . "*";
    }
    $convertedText .= $remainder;
    return $convertedText;
}

// echo wrap('dictionaries', 5);

// function wrap($text, $lineLength)
// {
//     if (strlen($text) > $lineLength) {
//         return substr($text, 0, $lineLength) . "<br>" .
//             wrap(substr($text, $lineLength), $lineLength);
//     }
//     return $text;
// }

// echo wrap('dictionarys', 5);

// $i = 'A';
// while ($i < 'H') {
//     echo $i;
//     $i++;
//     echo '<br>';
// }

/*          Nested while loop        */
// $i = 1;
// while ($i <= 3) {
//     $j = 1;
//     while ($j <= 3) {
//         echo "$i $j<br>";
//         $j++;
//     }
//     $i++;
// }

/*
1   1
1   2
1   3
2   1
2   2
2   3
3   1
3   2
3   3
 */
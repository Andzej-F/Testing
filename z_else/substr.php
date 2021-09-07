<?php

// $rest1 = substr('abcdef', -1);
// echo $rest1 . "\n";

// $rest2 = substr('abcdef', -2);
// echo $rest2 . "\n";

// $rest3 = substr('abcdef', -9, 4);
// echo $rest3 . "\n";

$rest = substr("abcdef", 4, -4);  // returns "cde"

var_dump(substr('a', 2)); // bool(false)
// var_dump($rest);
// if ($rest == true) {
//     echo "returns true\n";
// }
// if ($rest == false) {
//     echo "returns false\n";
// }

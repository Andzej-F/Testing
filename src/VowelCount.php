<?php

class VowelCount
{
    public function getCount($string)
    {
        $vowelsCount = 0;

        $vowelsArray = ['a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U'];
        $stringArray = str_split($string, 1);
        foreach ($stringArray as $vowel) {
            if (in_array($vowel, $vowelsArray)) {
                $vowelsCount += 1;
            }
        }
        return $vowelsCount;
    }
}

/* Other solutions
function getCount($str) {;
  
  return preg_match_all('/[aeiou]/i',$str,$matches);
}

function getCount($str) {
  $vowelsCount = 0;
  $vowels = ['a', 'e', 'i', 'o', 'u'];
  // enter your magic here
  foreach($vowels as $vowel) {
    $vowelsCount += substr_count($str, $vowel);
  }
  
  
  return $vowelsCount;
}

*/

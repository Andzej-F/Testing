<?php
class Factorial
{
    public function factorial($n)
    {
        // if (is_int($n) === false) {
        //     throw new FactorialException('Number must be of integer type');
        // }

        // if ($n < 0) {
        //     throw new FactorialException('Number cannot be negative integer');
        // }

        // Base case
        if ($n == 0) {
            echo "Base case: $n = 0. Returning 1...<br>";
            return 1;
        }


        // Recursion
        echo "$n=$n: Computing $n * factorial(" . ($n - 1) . ")...<br>";
        $result = ($n * $this->factorial($n - 1));
        echo "Rresult of $n*factorial(" . $n - 1 . ")=$result. Returning $result...<br>";
        return $result;
    }
}
$object = new Factorial();

echo "The factorial of 5 is: " . $object->factorial(5);

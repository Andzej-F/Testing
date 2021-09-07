<?php

use function PHPUnit\Framework\isEmpty;

class User1
{
    public $name;
    public $surname;

    public function getFullName()
    {
        return trim("$this->name $this->surname");
    }
}

$user1 = new User1();
// $user1->name = 'Anthony';
echo $user1->getFullName();

echo '<hr>';

if ($user1->surname === '') {
    echo "$user1->surname is empty<br>";
} else {
    echo "$user1->surname is NOT empty<br>";
}

echo '<pre>';
print_r(get_defined_vars());

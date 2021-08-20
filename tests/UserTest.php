<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        require './src/User.php';

        $user = new User();

        $user->first_name = 'Teresa';
        $user->surname = 'Green';

        $this->assertEquals('Teresa Green', $user->getFullName());
    }

    /* If $first_name and $surname properties are not set
    we want the function to return an empty string */
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
        $this->assertEmpty($user->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user = new User;
        $user->first_name = 'Teresa';
        $this->assertEquals('Teresa', $user->first_name);

        // print_r(get_defined_vars());
    }

    /**
     * @test
     */
    // public function testUserHasFirstname()
    public function user_has_first_name()
    {
        $user = new User();

        $user->first_name = 'Teresa';

        $this->assertEquals('Teresa', $user->first_name);
    }
}

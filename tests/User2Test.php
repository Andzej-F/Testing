<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

class User2Test extends TestCase
{
    public function testReturnsFullName()
    {
        $user2 = new User2();

        $user2->first_name = 'Teresa';
        $user2->surname = 'Green';

        $this->assertEquals('Teresa Green', $user2->getFullName());
    }

    /* If $first_name and $surname properties are not set
    we want the function to return an empty string */
    public function testFullNameIsEmptyByDefault()
    {
        $user2 = new User2();

        $this->assertEquals('', $user2->getFullName());
        $this->assertEmpty($user2->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user2 = new User2;
        $user2->first_name = 'Teresa';
        $this->assertEquals('Teresa', $user2->first_name);

        // print_r(get_defined_vars());
    }

    /**
     * @test
     */
    // public function testUserHasFirstname()
    public function user_has_first_name()
    {
        $user2 = new User2();

        $user2->first_name = 'Teresa';

        $this->assertEquals('Teresa', $user2->first_name);
    }

    public function testNotificationIsSent()
    {
        $user2 = new User2();

        // $user2->email = 'dave@example.com';
        // $user2->notify('Hello');
        // $this->assertTrue($user2->notify('Hello'));

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->method('sendmessage')
            ->willReturn(true);

        $user2->email = 'dave@example.com';

        $this->assertTrue($user2->notify('Hello'));
    }
}

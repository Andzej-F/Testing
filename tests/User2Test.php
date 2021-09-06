<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

class User2Test extends TestCase
{
    // public function testReturnsFullName()
    // {
    //     $user2 = new User2();

    //     $user2->first_name = 'Teresa';
    //     $user2->surname = 'Green';

    //     $this->assertEquals('Teresa Green', $user2->getFullName());
    // }

    // /* If $first_name and $surname properties are not set
    // we want the function to return an empty string */
    // public function testFullNameIsEmptyByDefault()
    // {
    //     $user2 = new User2();

    //     $this->assertEquals('', $user2->getFullName());
    //     $this->assertEmpty($user2->getFullName());
    // }

    // public function testUserHasFirstName()
    // {
    //     $user2 = new User2;
    //     $user2->first_name = 'Teresa';

    //     $this->assertEquals('Teresa', $user2->first_name);
    // }

    public function testNotificationIsSent()
    {
        /* Regular way */
        // $user2 = new User2();
        // $user2->email = 'dave@example.com';
        // // $user2->notify('Hello');

        // $this->assertTrue($user2->notify('Hello'));

        /* Creating mock object */
        $user2 = new User2();
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user2->setMailer($mock_mailer);

        $user2->email = 'dave@example.com';

        $this->assertTrue($user2->notify('Hello'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User2();
        $mock_mailer = $this->createMock(Mailer::class);
        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify('Hello');
    }
}

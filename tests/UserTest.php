<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        /* Step 1 */
        // $user = new User();

        // $mock_mailer = $this->createMock(Mailer::class);

        // $mock_mailer->method('sendMessage')
        // ->willReturn(true);

        // $user->setMailer($mock_mailer);

        // $user->email = 'dave@example.com';

        // $this->assertTrue($user->notify("Hello"));


        // /* Step 2: add "expects($this->once())" */
        // $user = new User();

        // $mock_mailer = $this->createMock(Mailer::class);

        // $mock_mailer
        //     ->expects($this->once())
        //     ->method('sendMessage')
        //     ->willReturn(true);

        // $user->setMailer($mock_mailer);

        // $user->email = 'dave@example.com';

        // $this->assertTrue($user->notify("Hello"));


        /* Step 3: add "with()" */
        $user = new User();

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = 'dave@example.com';

        $this->assertTrue($user->notify("Hello"));
    }
}

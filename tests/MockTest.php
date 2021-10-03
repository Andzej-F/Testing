<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        /* 20. Test doubles: create mock objects to remove dependencies
        on externalresources */

        /* Step 1: Test with the real object*/
        // $mailer = new Mailer();
        // $result = $mailer->sendMessage('dave@example.com', 'Hello');
        // var_dump($result);


        /* Step 2: Create mock version of the original object*/
        // $mailerMockObj = $this->createMock(Mailer::class);
        // $result = $mailerMockObj->sendMessage('dave@example.com', 'Hello');
        // var_dump($result);


        /* Step 3: Set mock object's return value to "true"*/
        // $mailerMockObj = $this->createMock(Mailer::class);

        // $mailerMockObj->method('sendMessage')
        //     ->willReturn(true);

        // $result = $mailerMockObj->sendMessage('dave@example.com', 'Hello');
        // var_dump($result);


        /* Step 4: Perform an assertion "assertTrue" */
        $mailerMockObj = $this->createMock(Mailer::class);

        $mailerMockObj->method('sendMessage')
            ->willReturn(true);

        $result = $mailerMockObj->sendMessage('dave@example.com', 'Hello');
        $this->assertTrue($result);
    }
    /* 21. Dependency injection: inject objects that a class depends on */
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        // /* Step 1: Use original object */
        // $user = new User;
        // $user->email = 'dave@example.com';
        // $this->assertTrue($user->notify("Hello"));

        // /* Step 2: Create mock object of mailer class */
        // $user = new User;
        // $mock_mailer = $this->createMock(Mailer::class);
        // $mock_mailer->method('sendMessage')
        //     ->willReturn(true);
        // $user->email = 'dave@example.com';
        // $this->assertTrue($user->notify("Hello"));

        // /* Step 3: Check if test works with the original Mailer
        // object in setter injection */
        // $user = new User;

        // $mock_mailer = $this->createMock(Mailer::class);

        // $mock_mailer->method('sendMessage')
        //     ->willReturn(true);

        // // Pass real Mailer object
        // $user->setMailer(new Mailer);

        // $user->email = 'dave@example.com';

        // $this->assertTrue($user->notify("Hello"));

        /* Step 4: Check if test works with mock Mailer object in setter */
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->method('sendMessage')
            ->willReturn(true);

        // Pass real Mailer object
        $user->setMailer($mock_mailer);

        $user->email = 'dave@example.com';

        $this->assertTrue($user->notify("Hello"));
    }
}

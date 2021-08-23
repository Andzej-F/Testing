<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        /* Traditional way */
        // $mailer = new Mailer;
        // $result = $mailer->sendMessage('dave@example.com', 'Hello');
        // var_dump($result);

        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }
}

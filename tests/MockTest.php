<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer;

        // $result = $mailer->sendMessage('dave@example.com', 'Hello');


        /* The $mock object contains all the properties of the original
        object */
        $mock = $this->createMock(Mailer::class);

        /* sendMessage is a stub method, by default stub methods 
        return NULL */

        /* Mock object methods are called stubs */
        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        // var_dump($result);

        $this->assertTrue($result);
    }
}

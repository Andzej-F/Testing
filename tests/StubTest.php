<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testStub(): void
    {
        /* Create a stub(1. kelmas, 2.galiukas, 1.susimusti) object for
         the SomeClass class. */
        $stub = $this->createStub(SomeClass::class);

        echo "\n";
        echo gettype($stub);

        // Configure the stub.
        $stub->method('doSomething')
            ->willReturn('foo');

        // Calling $stub->doSomenthing() will now return 'foo'.
        $this->assertSame('foo', $stub->doSomething()); // OK

        // $this->assertSame('5', $stub->doSomething()); // F: Failed asserting that 5
        // is identical to '5'.
        // $this->assertEquals('5', $stub->doSomething()); // OK
    }
}

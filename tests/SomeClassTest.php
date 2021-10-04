<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SomeClassTest extends TestCase
{
    //Example 8.2 Stubbing a method call to return a fixed value
    public function testStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub
        $stub
            // ->expects($this->any())
            ->method('doSomething')
            ->willReturn('foo');

        // $stub
        //     // ->expects($this->any())
        //     ->method('method')
        //     ->willReturn('vilkas');

        $stub
            // ->expects($this->any())
            ->method('methodAu')
            ->willReturn('lape');

        // Calling $stub->doSomething() will now return 'foo'
        $this->assertSame('foo', $stub->doSomething());
        // $this->assertSame('vilkas', $stub->method());
        $this->assertSame('lape', $stub->methodAu());
    }

    // Example 8.4 Using the Mock Builder API can be used to
    // configure the generated test double class
    public function testStub2(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->getMockBuilder(SomeClass::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        // Configure the stub
        $stub->method('doSomething')
            ->willReturn('foo5');
        // ->will($this->returnValue('foo'));

        // Calling $stub->doSomething() will now return 'foo'
        $this->assertSame('foo5', $stub->doSomething());
    }

    // Example 8.5 Stubbing a method call to return one of the arguments
    public function testReturnArgumentStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnArgument(0));

        // $stub->doSomething('foo') returns 'foo'
        $this->assertSame('foo', $stub->doSomething('foo'));

        // $stub->doSomething('bar') returns 'bar'
        $this->assertSame('bar', $stub->doSomething('bar'));
    }

    // Example 8.6 Stubbing a method call to return a reference 
    // to the stub object
    public function testReturnSelf(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnSelf());

        // $stub->doSomething() returns $stub
        $this->assertSame($stub, $stub->doSomething());
    }

    // Example 8.7 Stubbing a method cal to return the value from a map
    public function testReturnvalueMapStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Create a map of arguments to return values.
        // The last argument of the subarray is a return value
        $map = [
            ['a', 'b', true],
            ['h'],
            [3, 10]
        ];

        // COnfigure the stub.
        $stub->method('doSomething')
            ->will($this->returnValueMap($map));

        // $stub->doSomething() returns different values depending on
        // the provided arguments.
        $this->assertSame(true, $stub->doSomething('a', 'b'));
        $this->assertSame(10, $stub->doSomething(3));
    }
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    private $factorial;

    public function setUp(): void
    {
        $this->factorial = new Factorial();
    }

    public function testFactorialOfFive()
    {
        $this->assertEquals(120, $this->factorial->factorial(5));
    }

    public function testFactorialOfZero()
    {
        $this->assertEquals(1, $this->factorial->factorial(0));
    }

    public function testExceptionThrownWhenPassingANegativeInteger()
    {
        $this->expectException(FactorialException::class);
        $this->expectExceptionMessage('Number cannot be negative integer');
        $this->factorial->factorial(-5);
    }

    public function testExceptionThrownWhenPassingNotInteger()
    {
        // $this->expectException(FactorialException::class);
        // $this->expectExceptionMessage('Number must be of integer type');
        // $this->factorial->factorial('5');

        $this->expectException(FactorialException::class);
        $this->expectExceptionMessage('Number must be of integer type');
        $this->factorial->factorial(2.5);

        // $this->expectException(FactorialException::class);
        // $this->expectExceptionMessage('Number must be of integer type');
        // $this->factorial->factorial(2);
    }
}

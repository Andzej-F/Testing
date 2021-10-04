<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PersonTest extends TestCase
{
    public function testGreeting()
    {
        $test = new Person();
        $this->assertEquals('Hello World', $test->greeting());
    }
}

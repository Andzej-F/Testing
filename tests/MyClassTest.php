<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MyClassTest extends TestCase
{
    protected function setUp(): void
    {
        $this->Logger = $this->buildLoggerDouble();
        $this->myClass = new MyClass($this->logger);
    }

    public function testSomeLogic(): void
    {
        // Configure the logger double to behave in a certain way
        // and exercise the logic of MyClass we want to test
    }
}

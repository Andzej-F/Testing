<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    private $stack;

    protected function setUp(): void
    {
        $this->stack = [];
    }

    public function testEmpty(): void
    {
        $this->assertTrue(empty($this->stack));
    }

    public function testPush(): void
    {
        array_push
    }
}

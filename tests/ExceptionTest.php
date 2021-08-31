<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/* Example 2.11 Using the expectException() method */

final class ExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }
}

<?php
/* Example 2.14 Testing the output of a function or method */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OutputTest extends TestCase
{
    public function testExpectFooActualFoo(): void
    {
        $this->expectOutputString('foo');

        echo 'foo';
    }

    public function testExpectbarActualBaz(): void
    {
        $this->expectOutputString('bar');

        echo 'baz';
    }
}

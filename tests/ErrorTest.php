<?php

declare(strict_types=1);
/* Example 2.12 Expecting PHP errors, warnings, and notices */

use PHPUnit\Framework\TestCase;

final class ErrorTest extends TestCase
{
    public function testDeprecatiomCanBeExpected(): void
    {
        $this->expectDeprecation();

        $this->expectDeprecationMessage('foo');

        $this->expectDeprecationMessageMatches('/foo/');

        \trigger_error('foo', \E_USER_DEPRECATED);
    }
}

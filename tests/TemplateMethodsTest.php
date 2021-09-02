<?php

declare(strict_types=1);

use phpunit\TestCase;

final class TemplateMethodsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
}

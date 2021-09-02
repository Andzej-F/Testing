<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SampleTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true, 'his should already work.');

        // $this->markTestIncomplete(
        //     'This test has not been implemented yet.'
        // );
    }
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/* Example 2.9 Combination of @depends ans @dataProvider in same test */

final class DependencyAndDataProviderComboTest extends TestCase
{
    public function provider(): array
    {
        return [['provider1'], ['provider2']];
    }

    public function testProducerFirst(): string
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond(): string
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer(): void
    {
        $this->assertSame(
            ['provider1', 'first', 'second'],
            func_get_args()
        );
    }
}

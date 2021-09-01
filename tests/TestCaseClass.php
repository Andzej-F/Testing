<?php

declare(strict_types=1);

// namespace TestNamespace;

use PHPUnit\Framework\TestCase;

class TestCaseClass extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testMethod($data)
    {
        $this->assertTrue($data);
    }

    public function provider(): array
    {
        return [
            'my named data' => [true],
            'my data' => [true]
        ];
    }
}

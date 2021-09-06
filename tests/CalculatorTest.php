<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
// use App\Calculator;

class CalculatorTest extends TestCase
{
    private $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator;
    }

    public function testAdd()
    {
        // $calculator = new Calculator;
        $this->calculator->setOperands([5, 20]);
        $this->assertEquals(25, $this->calculator->add());
    }
}

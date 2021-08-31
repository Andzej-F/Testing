<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GermanCarTest extends TestCase
{
    public $car;

    public function setUp(): void
    {
        $this->car = new GermanCar();
    }

    public function testGermanCarClassHasFiveCars()
    {
        $this->assertEquals(5, count($this->queue->germanCarsArray()));
    }
}

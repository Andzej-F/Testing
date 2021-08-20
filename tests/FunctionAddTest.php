<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

class FunctionAddTest extends TestCase
{

    public function testAddReturnsTheCorrectSum()
    {
        require './src/FunctionAdd.php';
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(3, 5));
    }

    public function testAddDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
    // public function testNumericValues()
    // {
    //     $this->assertIsNumeric('4');
    //     $this->assertIsNumeric(4);
    // }

    // public function testIntegerType()
    // {
    //     $this->assertIsInt('4');
    // }
}

<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class VowelCountTest extends TestCase
{
    private $object;

    public function setUp(): void
    {
        $this->object = new VowelCount();
    }

    public function testLowerCaseLettersWordVowelCount()
    {
        $this->assertEquals(3, $this->object->getCount('computer'));
    }

    public function testUpperCaseLettersWordVowelCount()
    {
        $this->assertEquals(3, $this->object->getCount('COMPUTER'));
    }

    public function testLowerAndUpeerCaseLettersWordVowelCount()
    {
        $this->assertEquals(3, $this->object->getCount('Computer'));
        $this->assertEquals(3, $this->object->getCount('CompUtery'));
        $this->assertEquals(5, $this->object->getCount('abracadabra'));
    }
}

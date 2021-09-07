<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class WrapperTest extends TestCase
{
    private $wrapper;

    public function setUp(): void
    {
        $this->wrapper = new Wrapper();
    }

    public function testItShoulWrapAnEmptyString()
    {
        $this->assertEquals('', $this->wrapper->wrap('', 0));
    }

    public function testDoesNotWrapAShorterThanMaxCharsWord()
    {
        $textToBeParsed = 'word';
        $maxLineLength = 5;
        $this->assertEquals($textToBeParsed, $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    public function testItWrapsAWordLongerThanLineLength()
    {
        $textToBeParsed = "alongword";
        $maxLineLength = 5;
        $this->assertEquals("along\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    public function testItWrapsAWordSeveralTimesIfItsTooLong()
    {
        $textToBeParsed = "averyverylongword";
        $maxLineLength = 5;
        $this->assertEquals("avery\nveryl\nongwo\nrd", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }
}

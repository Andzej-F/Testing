<?php

/* Test dependencies */

use \PHPUnit\Framework\TestCase;

class Queue4Test extends TestCase
{
    /* Property to store a $queue object */
    protected static $queue;

    /* This method will be called before each test method */
    protected function setUp(): void
    {
        $this->queue = new Queue3();
    }

    /* Is run before the first test of the class is run */
    public static function setUpBeforeClass(): void
    {
        /* E.g connect to server */
        static::$queue = new Queue3();
    }

    /* Is run after the last test of the class is run */
    public static function tearDownAfterClass(): void
    {
    }

    /* Test that we depend on is "producer" */
    public function testNewQueueIsEmpty()
    {
        /* Check if the initial number of items in the queue is zero */
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {

        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');

        $this->assertEquals('green', $this->queue->items[0]);

        $this->assertEquals(1, $this->queue->getCount());

        // print_r($this->queue->items);

        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals(2, $this->queue->getCount());

        $item = $this->queue->pop();
        $this->assertEquals('first', $item);
    }
}

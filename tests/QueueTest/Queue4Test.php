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
        /* Empties the queue before each test method */
        static::$queue->clear();
    }

    /* Is run before the first test of the class is run */
    public static function setUpBeforeClass(): void
    {
        /* E.g connect to server */
        static::$queue = new Queue4();
    }

    /* Is run after the last test of the class is run */
    public static function tearDownAfterClass(): void
    {
        /* E.g disconnect from the server, close the
        DB connection */
        static::$queue = null;
    }

    /* Test that we depend on is "producer" */
    public function testNewQueueIsEmpty()
    {
        /* Check if the initial number of items in the queue is zero */
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {

        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');

        $this->assertEquals('green', static::$queue->items[0]);

        $this->assertEquals(1, static::$queue->getCount());

        print_r(static::$queue->items);

        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals(2, static::$queue->getCount());

        $item = static::$queue->pop();
        $this->assertEquals('first', $item);
    }
}

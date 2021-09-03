<?php

/* Test dependencies */

use \PHPUnit\Framework\TestCase;

class Queue3Test extends TestCase
{
    /* Property to store a $queue object */
    protected $queue;

    /* This method will be called before each test method */
    protected function setUp(): void
    {
        $this->queue = new Queue3();
    }


    public function tearDown(): void
    {
        unset($this->queue);
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

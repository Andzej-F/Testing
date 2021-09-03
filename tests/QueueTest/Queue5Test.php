<?php

/* Test dependencies */

use \PHPUnit\Framework\TestCase;

class Queue5Test extends TestCase
{
    /* Property to store a $queue object */
    protected $queue;

    /* This method will be called before each test method */
    protected function setUp(): void
    {
        /* Empties the queue before each test method */
        $this->queue = new Queue5();
    }

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

    public function testMaxNumberOfItemsCanBeAdded()
    {
        $queue = new Queue5();

        for ($i = 0; $i < Queue5::MAX_ITEMS; $i++) {
            $this->queue->push('item ' . $i + 1);
        }

        $this->assertEquals(Queue5::MAX_ITEMS, $this->queue->getCount());

        // print_r($this->queue->items);
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue5::MAX_ITEMS; $i++) {
            $this->queue->push('item ' . $i + 1);
        }
        // print_r($this->queue->items);

        /* SomeClass::class will return the fully qualified name of 
         SomeClass including the namespace. This feature was implemented
         in PHP 5.5. */
        $this->expectException(QueueException::class);

        $this->expectExceptionMessage('Queue is full');

        $this->queue->push('additional item');
        // $this->queue->push('additional item 2');


        // $this->assertEquals(Queue5::MAX_ITEMS, $this->queue->getCount());
    }
}

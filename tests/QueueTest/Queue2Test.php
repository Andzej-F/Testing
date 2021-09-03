<?php

/* Test dependencies */

use \PHPUnit\Framework\TestCase;

class Queue2Test extends TestCase
{
    /* Test that we depend on is "producer" */
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue2;

        /* Check if the initial number of items in the queue is zero */
        $this->assertEquals(0, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     * 
     * dependent test aka "consumer"
     */
    public function testAnItemIsAddedToTheQueue(Queue2 $queue)
    {

        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testAnItemIsAddedToTheQueue
     */
    public function testAnItemIsRemovedFromTheQueue(Queue2 $queue)
    {

        $this->assertEquals('green', $queue->items[0]);

        $this->assertEquals(1, $queue->getCount());

        print_r($queue->items);

        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());

        $this->assertEquals('green', $item);
    }
}

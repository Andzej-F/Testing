<?php

use \PHPUnit\Framework\TestCase;

class Queue1Test extends TestCase
{
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue1;

        /* Check if the initial number of items in the queue is zero */
        $this->assertEquals(0, $queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $queue = new Queue1();

        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $queue = new Queue1();

        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());

        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());

        $this->assertEquals('green', $item);
    }
}

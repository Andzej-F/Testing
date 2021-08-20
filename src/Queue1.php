<?php

/**
 * Queue1
 * 
 * A first-in, first-out data structure
 */
class Queue1
{

    /**
     * Maximum number if the items in the queue
     * @var integer
     */

    /**
     * Queue items
     * @var array
     */
    protected $items = [];

    /**
     * Add an item to the end of the ququ
     * 
     * @param mixed $item The item
     */
    public function push($item)
    {
        $this->items[] = $item;
    }

    /**
     * Take an item off the end of the queue
     * 
     * @return mixed The item
     */
    public function pop()
    {
        // returns an item from the end of the array
        return array_pop($this->items);
    }

    /**
     * Get the total number of items in the queue
     * //TODO change
     * @return integer The number of items;
     */
    public function getCount()
    {
        return count($this->items);
    }
}

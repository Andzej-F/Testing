<?php

namespace src\Queue;

class Queue1
{
    protected $items = [];

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        // returns an item from the end of the array
        return array_pop($this->items);
    }

    public function getCount()
    {
        return count($this->items);
    }
}

<?php

class Queue
{
    const MAX_ITEMS = 5;
    protected $items = [];

    public function push($item) {

        if ($this->getCount() == static::MAX_ITEMS) {
            throw new QueueException("Queue is full");
        }

        $this->items[] = $item;
    }

    // enlever le premier element du tableau
    public function pop()
    {
        return array_shift($this->items);
    }

    public function getCount() {
        return count($this->items);
    }

    public function clear() {
        $this->items = [];
    }
}

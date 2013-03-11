<?php
namespace SimpleValidation;

trait ReadOnlyArray
{
    private $items = [];

    public function offsetGet($key)
    {
        if (!array_key_exists($key, $this->items)) {
            throw new \OutOfRangeException();
        }

        return $this->items[$key];
    }

    public function offsetSet($key, $value)
    {
        throw new \BadMethodCallException();
    }

    public function offsetExists($key)
    {
        return isset($this->items[$key]);
    }

    public function offsetUnset($key)
    {
        throw new \BadMethodCallException();
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function count()
    {
        return count($this->items);
    }
}

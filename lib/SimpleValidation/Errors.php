<?php
namespace SimpleValidation;

class Errors implements \ArrayAccess, \IteratorAggregate, \Countable
{
    use ReadOnlyArray;

    public function add($property, $message = null)
    {
        if (!$message) {
            $message = "invalid";
        }

        $this->items[$property] = $message;
    }

    public function clear()
    {
        $this->items = [];
    }
}

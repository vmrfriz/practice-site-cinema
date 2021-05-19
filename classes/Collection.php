<?php

abstract class Collection implements Countable, Iterator, ArrayAccess
{
    protected $_collection = [];
    protected $_position = 0;

    public function remove($id) {
        foreach ($this->_collection as $k => $entity) {
            if ($entity->id == $id) {
                unset($this->_collection[$k]);
                return true;
            }
        }
        return false;
    }

    public function has(int $id): bool {
        foreach ($this->_collection as $entity) {
            if ($entity->id == $id) return true;
        }
        return false;
    }

    public function &iterate()
    {
        foreach ($this->_collection as &$v) {
            yield $v;
        }
    }

    /**
     * Countable
     */
    public function count() {
        return count($this->_collection);
    }

    /**
     * Iterator
     */
    public function rewind() {
        $this->_position = 0;
    }

    public function current() {
        return $this->_collection[$this->_position];
    }

    public function key() {
        return $this->_position;
    }

    public function next() {
        ++$this->_position;
    }

    public function valid() {
        return isset($this->_collection[$this->_position]);
    }

    /**
     * ArrayAccess
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->_collection[] = $value;
        } else {
            $this->_collection[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->_collection[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->_collection[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->_collection[$offset]) ? $this->_collection[$offset] : null;
    }
}

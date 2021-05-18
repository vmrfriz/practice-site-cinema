<?php

class MovieCollection implements Countable, Iterator
{
    protected $_collection = [];
    protected $_position = 0;

    public function add(Movie $movie) {
        if (!$this->hasMovie($movie->id)) {
            $this->_collection[] = $movie;
        }
    }

    public function remove($id) {
        foreach ($this->_collection as $k => $movie) {
            if ($movie->id == $id) {
                unset($this->_collection[$k]);
                return true;
            }
        }
        return false;
    }

    public function hasMovie(int $id): bool {
        foreach ($this->_collection as $movie) {
            if ($movie->id == $id) return true;
        }
        return false;
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
}

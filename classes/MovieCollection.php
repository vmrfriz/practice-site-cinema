<?php

class MovieCollection extends Collection
{
    protected $_collection = [];
    protected $_position = 0;

    public function add(Movie $movie) {
        if (!$this->has($movie->id)) {
            $this->_collection[] = $movie;
        }
    }
}

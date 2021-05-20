<?php

class GenreCollection extends Collection
{
    public function add(Genre $genre) {
        if (!$this->has($genre->id)) {
            $this->_collection[] = $genre;
        }
    }
}

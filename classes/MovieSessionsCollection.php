<?php

class MovieSessionsCollection extends Collection
{
    public function add(MovieSession $session) {
        $this->_collection[] = $session;
    }
}

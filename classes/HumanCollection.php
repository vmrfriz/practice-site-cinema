<?php

class HumanCollection extends Collection
{
    protected $_collection = [];
    protected $_position = 0;

    public function add(Human $human) {
        if (!$this->has($human->id)) {
            $this->_collection[] = $human;
        }
    }
}

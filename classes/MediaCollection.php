<?php

class MediaCollection extends Collection
{
    protected $_collection = [];
    protected $_position = 0;

    public function add(Media $media) {
        if (!$this->has($media->id)) {
            $this->_collection[] = $media;
        }
    }
}

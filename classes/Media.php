<?php

class Media
{
    public $id;
    public $film_id;
    public $url;
    public $thumb;

    public function __construct($data) {
        $this->id = intval($data['id']);
        $this->film_id = intval($data['film_id']);
        $this->url = $data['url'];
        $this->thumb = $data['thumb'];
    }

    public static function getFilmMedia(int $id) {
        $sql = 'SELECT * FROM `media` WHERE `film_id` = ' . $id;
        $db_result = Database::getConnection()->query($sql);

        $collection = new MediaCollection;
        while ($media = $db_result->fetch_assoc()) {
            $collection->add( new static($media) );
        }

        return $collection;
    }
}

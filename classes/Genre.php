<?php

class Genre
{
    public $id;
    public $title;

    public function __construct($data) {
        $this->id = intval($data['id']);
        $this->title = $data['title'];
    }

    public static function getById(int $id): self {
        $sql = 'SELECT * FROM `genres` WHERE `id`=' . $id;
        $db_result = Database::getConnection()->query($sql);

        if (!$db_result || !$db_result->num_rows) return false;

        return new static($db_result->fetch_assoc());
    }

    public static function getAll(): GenreCollection {
        $sql = 'SELECT * FROM `genres`';
        $db_result = Database::getConnection()->query($sql);

        $genres = new GenreCollection;
        while ($genre = $db_result->fetch_assoc()) {
            $genres->add(new static($genre));
        }

        return $genres;
    }
}

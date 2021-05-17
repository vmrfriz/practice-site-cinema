<?php

class Film
{
    public function __construct(int $id)
    {
        $sql = 'SELECT * FROM `films` WHERE `id` = ' . $id . ' LIMIT 1';

        $data = \Database::getConnection()
            ->query($sql)
            ->fetch_assoc();

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->poster = $data['poster'];
        $this->director = $data['director'];
        $this->duration = $data['duration'];
        $this->trailer_url = $data['trailer_url'];
        $this->release_date = date('d.m.Y', strtotime($data['release_date']));
        $this->created_at = $data['created_at'];
    }

    public function getCast(): array {
        $sql = 'SELECT `actors`.*
            FROM `films_actors` AS `fa`
            JOIN `actors` ON `fa`.`actor_id` = `actors`.`id`
            WHERE `fa`.`film_id` = ' . $this->id;

        $data = \Database::getConnection()
            ->query($sql)
            ->fetch_all(MYSQLI_ASSOC);

        return $data ?: [];
    }

    public function getGenres(): array {
        $sql = 'SELECT `genres`.*
            FROM `films_genres` AS `fa`
            JOIN `genres` ON `fa`.`genre_id` = `genres`.`id`
            WHERE `fa`.`film_id` = ' . $this->id;

        $data = \Database::getConnection()
            ->query($sql)
            ->fetch_all(MYSQLI_ASSOC);

        return $data ?: [];
    }

    public function getMedia(): array {
        $sql ='SELECT * FROM `media` WHERE `film_id` = ' . $this->id;

        $data = \Database::getConnection()
            ->query($sql)
            ->fetch_all(MYSQLI_ASSOC);

        return $data ?: [];
    }
}

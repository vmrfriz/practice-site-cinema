<?php

class Movie
{
    public function __construct(array $data) {
        $this->id = intval($data['id']);
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->short_description = (strlen($this->description) < 150) ? $this->description : (substr($this->description, 0, 150) . '...');
        $this->poster = $data['poster'];
        $this->director_id = intval($data['director_id']);
        $this->duration = $data['duration'];
        $this->trailer_url = $data['trailer_url'];
        $this->release_date = date('d.m.Y', strtotime($data['release_date']));
        $this->created_at = $data['created_at'];
    }

    public static function getById(int $id) {
        $sql = 'SELECT * FROM `films` WHERE `id` = ' . $id . ' LIMIT 1';

        $db_result = \Database::getConnection()->query($sql);

        if (!$db_result->num_rows) {
            return false;
        }

        $data = $db_result->fetch_assoc();

        return new static($data);
    }

    public static function getByName(string $name, int $page = 1) {
        $limit = 10;
        $name = addslashes($name);
        $sql = 'SELECT * FROM `films` WHERE `name` LIKE \'%'.$name.'%\' LIMIT ' . $limit . ' OFFSET ' . (($page - 1) * $limit);
        $data = Database::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);
        $movies = new MovieCollection;
        foreach ($data as $movie) {
            $movies->add( new static($movie) );
        }
        return $movies;
    }

    public static function getLimit(int $limit, int $offset = 0): MovieCollection {
        $sql = 'SELECT * FROM films OFFSET LIMIT ' . $limit . ' OFFSET ' . $offset;
        $data = Database::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);
        $movies = new MovieCollection;
        foreach ($data as $movie) {
            $movies->add( new static($movie) );
        }
        return $movies;
    }

    public function getCast(): array {
        $sql = 'SELECT `actors`.*
            FROM `films_actors` AS `fa`
            JOIN `actors` ON `fa`.`actor_id` = `actors`.`id`
            WHERE `fa`.`film_id` = ' . $this->id;

        $data = \Database::getConnection()->query($sql);

        return $data ? $data->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getGenres(): array {
        $sql = 'SELECT `genres`.*
            FROM `films_genres` AS `fa`
            JOIN `genres` ON `fa`.`genre_id` = `genres`.`id`
            WHERE `fa`.`film_id` = ' . $this->id;

        $data = \Database::getConnection()->query($sql);

        return $data ? $data->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getDirector(): Human {
        return Human::getById($this->director_id);
    }
}

<?php

class Human
{
    public $id;
    public $name;
    public $photo;

    public function __construct(array $data) {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->photo = $data['photo'] ?? null;
    }

    public static function getById(int $id) {
        $sql = 'SELECT * FROM `humans` WHERE `id` = ' . $id . ' LIMIT 1';
        $db_result = Database::getConnection()->query($sql);

        if (!$db_result || !$db_result->num_rows) {
            return false;
        }

        return new static( $db_result->fetch_assoc() );
    }

    public static function getFilmActors(int $film_id, int $limit = 0) {
        $sql = 'SELECT * FROM `humans` JOIN `films_actors` AS `fa` ON `fa`.`human_id` = `humans`.`id` WHERE `film_id` = ' . $film_id . ($limit > 0 ? " LIMIT {$limit}" : '');
        $db_result = Database::getConnection()->query($sql);

        $collection = new HumanCollection;
        while ($actor = $db_result->fetch_assoc()) {
            $collection->add( new static($actor) );
        }

        return $collection;
    }

    public function getInitials() {
        $name_parts = explode(' ', $this->name);

        $initials = (count($name_parts) > 1)
            ? $name_parts[0][0] . $name_parts[1][0]
            : $this->name[0] . $this->name[1];

        return strtoupper($initials);
    }
}

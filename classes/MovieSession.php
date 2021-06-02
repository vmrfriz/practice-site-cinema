<?php

class MovieSession
{
    public $id;
    public $film_id;
    public $started_at;

    public function __construct($data) {
        $this->id = intval($data['id']);
        $this->film_id = $data['film_id'];
        $this->started_at = strtotime($data['started_at']);
    }

    public static function getById(int $session_id): ?self {
        $sql = 'SELECT * FROM `sessions` WHERE `id`=' . $session_id . ' LIMIT 1';
        $db_result = Database::getConnection()->query($sql);

        if (!$db_result || !$db_result->num_rows) return null;

        $data = $db_result->fetch_assoc();
        return new static($data);
    }

    public function getMovie(): ?Movie {
        $sql = 'SELECT `films`.* FROM `films` JOIN `sessions` ON `films`.`id` = `sessions`.`film_id` WHERE `sessions`.`id`=' . $this->id . ' LIMIT 1';
        $db_result = Database::getConnection()->query($sql);

        if (!$db_result || !$db_result->num_rows) return null;

        return new Movie($db_result->fetch_assoc());
    }
}

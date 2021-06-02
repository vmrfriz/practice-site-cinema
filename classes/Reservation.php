<?php

class Reservation
{
    public $session_id;
    public $row;
    public $seat;
    public $phone;

    public function __construct(array $data) {
        $this->session_id = intval($data['session_id']);
        $this->row = intval($data['row']);
        $this->seat = intval($data['seat']);
        $this->phone = intval($data['phone']);
    }

    public function getMovie() {
        $sql = 'SELECT `f`.* FROM `films` AS `f`
            JOIN `sessions` AS `s` ON `f`.`id` = `s`.`film_id`
            WHERE `s`.`id` = \'' . $this->session_id . '\';';
        $db_result = Database::getConnection()->query($sql);
        if ($movie = $db_result->fetch_assoc()) {
            return new Movie($movie);
        }
    }

    public static function isReserverd(int $session_id, int $row, int $seat) {
        $sql = 'SELECT `session_id` FROM `sessions_reservations` WHERE `session_id` = ' . $session_id . ' AND `row` = ' . $row . ' AND `seat` = ' . $seat . ' LIMIT 1';
        $db_result = \Database::getConnection()->query($sql);
        if (!$db_result || !$db_result->num_rows) return false;
        return true;
    }

    public static function bySession(int $session_id) {
        $sql = 'SELECT * FROM `sessions` WHERE `id` = \'' . $session_id . '\';';
        $db_result = Database::getConnection()->query($sql);
        $reservations = new ReservationCollection;
        while ($reservation = $db_result->fetch_assoc()) {
            $reservations->add( new static($reservation) );
        }
        return $reservations;
    }

    public static function getByFilmId(int $film_id): ReservationCollection {
        $sql = 'SELECT *
            FROM `sessions` AS `s`
            JOIN `sessions_reservations` AS `sr` ON `s`.`id` = `sr`.`session_id`
            WHERE `s`.`film_id` = ' . $film_id;
        $db_result = Database::getConnection()->query($sql);
        $reservations = new ReservationCollection;
        while ($reservation = $db_result->fetch_assoc()) {
            $reservations->add( new static($reservation) );
        }
        return $reservations;
    }
}

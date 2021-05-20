<?php

class Reservation
{
    public $film_id;
    public $row;
    public $seat;
    public $phone;

    public function __construct(array $data) {
        $this->film_id = intval($data['film_id']);
        $this->row = intval($data['row']);
        $this->seat = intval($data['seat']);
        $this->phone = intval($data['phone']);
    }

    public static function isReserverd(int $film_id, int $row, int $seat) {
        $sql = 'SELECT `film_id` FROM `films_reservations` WHERE `film_id` = ' . $film_id . ' AND `row` = ' . $row . ' AND `seat` = ' . $seat . ' LIMIT 1';
        $db_result = \Database::getConnection()->query($sql);
        if (!$db_result || !$db_result->num_rows) return false;
        return true;
    }

    public static function getByFilmId(int $film_id): ReservationCollection {
        $sql = 'SELECT * FROM `films_reservations` WHERE `film_id` = ' . $film_id;
        $db_result = Database::getConnection()->query($sql);
        $reservations = new ReservationCollection;
        while ($reservation = $db_result->fetch_assoc()) {
            $reservations->add( new static($reservation) );
        }
        return $reservations;
    }
}

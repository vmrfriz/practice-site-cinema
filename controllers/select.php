<?php

$film_id = intval(Router::getNext());
$movie = Movie::getById($film_id);
if (!$movie) header('Location: ' . $_SERVER['HTTP_REFERER']);

$reservations_object = Reservation::getByFilmId($movie->id);

$reservations = [];
foreach ($reservations_object as $reserv) {
    if (!isset($reservations[$reserv->row]))
        $reservations[$reserv->row] = [];
    $reservations[$reserv->row][] = $reserv->seat;
}

new View('select-position', false, compact('movie', 'reservations'));

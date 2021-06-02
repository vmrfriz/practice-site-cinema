<?php

$session_id = intval(Router::getNext());
$current_session = MovieSession::getById($session_id);
if (!$current_session) header('Location: ' . $_SERVER['HTTP_REFERER']);
$movie = $current_session->getMovie();
if (!$movie) header('Location: ' . $_SERVER['HTTP_REFERER']);
$sessions = $movie->getSessions();
$reservations_object = Reservation::getByFilmId($session_id);

$reservations = [];
foreach ($reservations_object as $reserv) {
    if (!isset($reservations[$reserv->row]))
        $reservations[$reserv->row] = [];
    $reservations[$reserv->row][] = $reserv->seat;
}

new View('select-position', false, compact('movie', 'reservations', 'current_session', 'sessions'));

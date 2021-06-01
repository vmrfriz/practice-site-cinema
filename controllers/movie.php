<?php

$id = Router::getNext();

$movie = Movie::getById($id);
if (!$movie) {
    http_response_code(404);
    include $_SERVER['DOCUMENT_ROOT'] . '/404.html';
    return;
}



$movie->director = Human::getById($movie->director_id);
$movie->actors = Human::getFilmActors($movie->id);




new View('single', true, compact('movie', 'genres'));

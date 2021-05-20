<?php

$id = Router::getNext();

try {
    $movie = Movie::getById($id);
} catch (\Exceptions\MovieNotFound $e) {
    http_response_code(404);
    include $_SERVER['DOCUMENT_ROOT'] . '/404.html';
    return;
}



$movie->director = Human::getById($movie->director_id);
$movie->actors = Human::getFilmActors($movie->id);
$movie->media = Media::getFilmMedia($movie->id);




new View('single', compact('movie', 'genres'));

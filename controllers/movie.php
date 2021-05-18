<?php

$id = Router::getNext();

try {
    $movie = Movie::getById($id);
} catch (\Exceptions\MovieNotFound $e) {
    http_response_code(404);
    include $_SERVER['DOCUMENT_ROOT'] . '/404.html';
    return;
}

$genres = array_map(
    function ($value) { return '<a href="/genre/'.urlencode(strtolower($value)).'">'.$value.'</a>'; },
    array_column($movie->getGenres(), 'title')
);
$genres = implode(', ', $genres);

new View('single', compact('movie', 'genres'));

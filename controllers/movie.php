<?php

$id = Router::getNext();

try {
    $movie = new Movie($id);
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

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/single.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php';

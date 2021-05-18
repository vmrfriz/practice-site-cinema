<?php

$id = Router::getNext();

$movie = new Movie($id);

$genres = array_map(
    function ($value) { return '<a href="/genre/'.urlencode(strtolower($value)).'">'.$value.'</a>'; },
    array_column($movie->getGenres(), 'title')
);
$genres = implode(', ', $genres);

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/single.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php';

<?php

$id = Router::getNext();

$film = new Film($id);
$genres = array_map(
    function ($value) { return '<a href="/genre/'.urlencode(strtolower($value)).'">'.$value.'</a>'; },
    array_column($film->getGenres(), 'title')
);
$genres = implode(', ', $genres);

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/single.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php';

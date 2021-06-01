<?php

$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$title_chpu = $params['layouts'];
$title = [
    'movies' => 'Фильмы',
    'genres' => 'Жанры',
    'humans' => 'Люди',
    'sessions' => 'Сеансы',
    'edit_movie' => 'Редактирование фильма',
    'edit_genre' => 'Редактирование жанра',
    'edit_human' => 'Редактирование человека',
    'edit_session' => 'Редактирование сеанс',
    'add_movies' => 'Добавление фильма',
    'add_genre' => 'Добавление жанра',
    'add_human' => 'Добавление человека',
    'add_session' => 'Добавление сеанс',
    'settings' => 'Основные настройки'
][$title_chpu] ?: 'Фильмы';

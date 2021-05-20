<?php

$limit = $_GET['limit'] ? intval($_GET['limit']) : 10;
$offset = $_GET['page'] ? intval($_GET['page'])-1 : 0;



/**
 * SQL: WHERE
 */
$sql_where = '';
$where = [];

if ($_GET['q']) {
    $where[] = '`f`.`name` LIKE \'%'. addslashes($_GET['q']) . '%\'';
}

if ($_GET['genres']) {
    $search_genres = array_map('intval', $_GET['genres']);
    $where[] = '`fg`.`genre_id` IN (' . implode(',', $search_genres) . ')';
}

if ($_GET['director']) {
    $where[] = '`f`.`director_id` = ' . intval($_GET['director']);
}

if ($_GET['actor']) {
    $where[] = '`fa`.`human_id` = ' . intval($_GET['actor']);
}

if ($where) {
    $sql_where .= ' WHERE ' . implode(' AND ', $where);
}



/**
 * SQL: JOIN
 */
$sql = 'SELECT * FROM `films` AS `f`';
$sql_joins = '';
if ($_GET['genres']) {
    $sql_joins .= ' INNER JOIN `films_genres` AS `fg` ON `f`.`id` = `fg`.`film_id`';
}

if ($_GET['actor']) {
    $sql_joins .= ' INNER JOIN `films_actors` AS `fa` ON `f`.`id` = `fa`.`film_id`';
}



$sql = 'SELECT COUNT(*) AS `count` FROM `films` AS `f`' . $sql_joins . $sql_where;
$db_result = Database::getConnection()->query($sql);
$movies_count = $db_result->fetch_assoc()['count'];



$sql = 'SELECT * FROM `films` AS `f`' . $sql_joins . $sql_where . ' LIMIT ' . $limit . ' OFFSET ' . ($limit * $offset);
$db_result = Database::getConnection()->query($sql);
$movies = new MovieCollection;
while ($movie = $db_result->fetch_assoc()) {
    $movies->add( new Movie($movie) );
}



foreach ($movies->iterate() as &$movie) {
    $movie->director = Human::getById($movie->director_id);
    $actors = Human::getFilmActors($movie->id, 3);
    $actors_html = [];
    foreach ($actors as $actor) {
        $actors_html[] = '<a href="/movies/?actor=' . $actor->id . '">' . $actor->name . '</a>';
    }
    $movie->actors = implode(', ', $actors_html);
}



$genres = Genre::getAll();

$pages_count = ceil($movies_count / $limit);
$current_page = $offset + 1;

new View('search', true, compact('movies', 'genres', 'movies_count', 'current_page', 'pages_count'));

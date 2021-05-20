<?php

$limit = $_GET['limit'] ? intval($_GET['limit']) : 10;
$offset = $_GET['page'] ? intval($_GET['page']) : 0;



$where = [];

if ($_GET['q']) {
    $where[] = '`f`.`name` LIKE \'%'. addslashes($_GET['q']) . '%\'';
}

if ($_GET['genres']) {
    $search_genres = array_map('intval', $_GET['genres']);
    $where[] = '`fg`.`genre_id` IN (' . implode(',', $search_genres) . ')';
}



$sql = 'SELECT * FROM `films` AS `f`';
if ($_GET['genres']) {
    $sql .= ' INNER JOIN `films_genres` AS `fg` ON `f`.`id` = `fg`.`film_id`';
}

if ($where) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
}

$sql .= ' LIMIT ' . $limit . ' OFFSET ' . ($limit * $offset);



$db_result = Database::getConnection()->query($sql);
$movies = new MovieCollection;
while ($movie = $db_result->fetch_assoc()) {
    $movies->add( new Movie($movie) );
}



foreach ($movies->iterate() as &$movie) {
    $movie->director = Human::getById($movie->director_id);
    $actors = Human::getFilmActors($movie->id, 3);
    $actors_names = [];
    foreach ($actors as $actor) {
        $actors_names[] = $actor->name;
    }
    $movie->actors = implode(', ', $actors_names);
}



$genres = Genre::getAll();


new View('search', compact('movies', 'genres'));

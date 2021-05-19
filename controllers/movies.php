<?php

if ($_GET['q']) {
    $movies = Movie::getByName($_GET['q']);
} else {
    $movies = Movie::getLimit(10);
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



new View('search', compact('movies'));

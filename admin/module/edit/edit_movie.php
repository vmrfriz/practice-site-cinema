<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    if(isset($_POST['update']))
    {
        $id = intval($_POST['id']);
        $name = addslashes($_POST['name']);
        $description = addslashes($_POST['description']);
        $poster = addslashes($_POST['poster']);
        $release_date = $_POST['release_date'];
        $director_id = intval($_POST['director_id']);
        $duration = intval($_POST['duration']);
        $trailer_url = addslashes($_POST['trailer_url']);
        $actors = $_POST['actors'];
        $genres = $_POST['genres'];

        fetch($conn, "UPDATE films
            SET
                name = '{$name}',
                description = '{$description}',
                poster = '{$poster}',
                release_date = '{$release_date}',
                director_id = '{$director_id}',
                duration = '{$duration}',
                trailer_url = '{$trailer_url}'
            WHERE
                id = {$id};
        ");

        array_walk($actors, 'intval');
        $values = implode(', ', $actors) ?: '';
        fetch($conn, "DELETE FROM films_actors WHERE film_id={$id} AND human_id NOT IN ({$values})");
        if (count($actors)) {
            $values = implode("), ({$id}, ", $actors) ?: '';
            fetch($conn, "INSERT IGNORE INTO films_actors (film_id, human_id) VALUES ({$id}, {$values})");
        }

        array_walk($genres, 'intval');
        $values = implode(', ', $genres) ?: '';
        fetch($conn, "DELETE FROM films_genres WHERE film_id={$id} AND genre_id NOT IN ({$values})");
        if (count($genres)) {
            $values = implode("), ({$id}, ", $genres) ?: '';
            fetch($conn, "INSERT IGNORE INTO films_genres (film_id, genre_id) VALUES ({$id}, {$values})");
        }

        header("Location: ?layouts=movies");
    }

    $movie = fetch($conn,"SELECT * FROM films WHERE id = '$id'");
    $humans = fetchAll($conn,"SELECT * FROM humans");
    $genres = fetchAll($conn,"SELECT * FROM genres");

    $actors = fetchAll($conn,"SELECT human_id FROM films_actors WHERE film_id = '$id'");
    $actors_ids = array_column($actors, 'human_id');
    $film_genres = fetchAll($conn,"SELECT genre_id FROM films_genres WHERE film_id = '$id'");
    $genres_ids = array_column($film_genres, 'genre_id');
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input class="input-edit" type="text" name="id" value="<?php echo $movie['id']; ?>" placeholder="ID" readonly="readonly">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input class="input-edit" type="text" name="name" id="name" value="<?php echo $movie['name']; ?>" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="description">Описание</label>
                <textarea class="input-edit" name="description" id="description" rows="10" cols="70" Required><?php echo $movie['description']; ?></textarea>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="poster">Постер</label>
                <input class="input-edit" type="text" name="poster" id="poster" value="<?php echo $movie['poster']; ?>" placeholder="Постер" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="duration">Длительность, минут</label>
                <input class="input-edit" type="number" name="duration" id="duration" value="<?php echo $movie['duration']; ?>" placeholder="Длительность, минут" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="trailer_url">Трейлер на YouTube</label>
                <input class="input-edit" type="text" name="trailer_url" id="trailer_url" value="<?php echo $movie['trailer_url']; ?>" placeholder="Трейлер на YouTube">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="release_date">Дата релиза</label>
                <input class="input-edit" type="date" name="release_date" id="release_date" value="<?php echo $movie['release_date']; ?>" placeholder="Дата релиза" Required>
            </div>
            <? //= $movie['director_id'] . ' | ' . var_export($humans, true) ?>
            <div class="d-flex direction-row align-center mt-3">
                <label for="director_id">Режиссер</label>
                <select class="input-edit" name="director_id" id="director_id">
                    <?php
                    foreach ($humans as $human) {
                        ?>
                        <option value="<?php echo $human['id']; ?>" <?=($movie['director_id'] == $human['id'] ? 'selected="selected"' : '')?>><?php echo $human['name'] . ' [' . $human['id'] . ']'; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="actors">Актёры</label>
                <select class="input-edit" name="actors[]" id="actors" multiple="multiple" style="min-height:300px">
                    <?php
                    foreach ($humans as $human) {
                        ?>
                        <option value="<?php echo $human['id']; ?>" <?=(in_array($human['id'], $actors_ids) ? 'selected="selected"' : '')?>><?php echo $human['name'] . ' [' . $human['id'] . ']'; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="genres">Жанры</label>
                <select class="input-edit" name="genres[]" id="genres" multiple="multiple" style="min-height:300px">
                    <?php
                    foreach ($genres as $genre) {
                        ?>
                        <option value="<?php echo $genre['id']; ?>" <?=(in_array($genre['id'], $genres_ids) ? 'selected="selected"' : '')?>><?php echo $genre['title'] . ' [' . $genre['id'] . ']'; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>

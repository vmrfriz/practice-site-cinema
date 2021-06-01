<?php
    if(isset($_POST['insert']))
    {
        $name = addslashes($_POST['name']);
        $description = addslashes($_POST['description']);
        $poster = addslashes($_POST['poster']);
        $release_date = $_POST['release_date'];
        $director_id = intval($_POST['director_id']);
        $duration = intval($_POST['duration']);
        $trailer_url = addslashes($_POST['trailer_url']);
        $actors = $_POST['actors'];
        $genres = $_POST['genres'];

        insert($conn, "INSERT INTO films
            (id, name, description, poster, release_date, director_id, duration, trailer_url)
            VALUES
            (NULL, '$name', '$description', '$poster', '$release_date', '$director_id', '$duration', '$trailer_url')
        ");
        $movie_id = $conn->lastInsertId();

        if (!empty($actors)) {
            array_walk($actors, 'intval');
            $values = implode("), ({$movie_id}, ", array_filter($actors));
            insert($conn, "INSERT INTO films_actors (film_id, human_id) VALUES ({$movie_id}, {$values})");
        }

        if (!empty($genres)) {
            array_walk($genres, 'intval');
            $values = implode("), ($movie_id, ", array_filter($genres));
            insert($conn, "INSERT INTO films_genres (film_id, genre_id) VALUES ({$movie_id}, {$values})");
        }

        header("Location: ?layouts=movies");
    }

    $humans = fetchAll($conn,"SELECT * FROM humans");
    $genres = fetchAll($conn,"SELECT * FROM genres");
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input class="input-edit" type="text" name="name" id="name" value="" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="description">Описание</label>
                <textarea class="input-edit" name="description" id="description" rows="10" cols="70" Required></textarea>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="poster">Постер</label>
                <input class="input-edit" type="text" name="poster" id="poster" value="" placeholder="Постер" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="duration">Длительность, минут</label>
                <input class="input-edit" type="number" name="duration" id="duration" value="" placeholder="Длительность, минут" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="trailer_url">Трейлер на YouTube</label>
                <input class="input-edit" type="text" name="trailer_url" id="trailer_url" value="" placeholder="Трейлер на YouTube">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="release_date">Дата релиза</label>
                <input class="input-edit" type="date" name="release_date" id="release_date" value="" placeholder="Дата релиза" Required>
            </div>
            <? //= $movie['director_id'] . ' | ' . var_export($humans, true) ?>
            <div class="d-flex direction-row align-center mt-3">
                <label for="director_id">Режиссер</label>
                <select class="input-edit" name="director_id" id="director_id">
                    <?php
                    foreach ($humans as $human) {
                        ?>
                        <option value="<?php echo $human['id']; ?>"><?php echo $human['name'] . ' [' . $human['id'] . ']'; ?></option>
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
                        <option value="<?php echo $human['id']; ?>"><?php echo $human['name'] . ' [' . $human['id'] . ']'; ?></option>
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
                        <option value="<?php echo $genre['id']; ?>"><?php echo $genre['title'] . ' [' . $genre['id'] . ']'; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

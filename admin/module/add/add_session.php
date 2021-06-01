<?php
    function hmformat($int) {
        return ($int < 10) ? '0'.$int : $int;
    }

    if(isset($_POST['insert']))
    {
        $film_id = intval($_POST['film_id']);
        $started_date = $_POST['started_date'];
        $started_h = intval($_POST['started_h']);
        $started_i = intval($_POST['started_i']);

        $started_at = date('Y-m-d H:i:s', strtotime($started_date . ' ' . hmformat($started_h) . ':' . hmformat($started_i)));

        $insert = insert($conn, "INSERT INTO sessions (id, film_id, started_at) VALUES (NULL, {$film_id}, '{$started_at}')");

        header("Location: ?layouts=sessions");
    }

    $movies = fetchAll($conn, "SELECT * FROM films");
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center mt-3">
                <label for="film_id">Фильм</label>
                <select class="input-edit" name="film_id" id="film_id" required="required">
                    <?php
                    foreach ($movies as $movie) {
                        ?>
                        <option value="<?php echo $movie['id']; ?>"><?php echo $movie['name'] . ' [' . $movie['id'] . ']'; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="started_date">Дата сеанса</label>
                <input id="started_date" class="input-edit" type="date" name="started_date" value="" placeholder="Дата сеанса" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="started_time">Время сеанса</label>
                <input id="started_time" class="input-edit mr-2" type="number" name="started_h" value="" min="0" max="23" size="3" placeholder="ЧЧ" Required>
                <input id="started_time" class="input-edit" type="number" name="started_i" value="" min="0" max="59" size="3" placeholder="ММ" Required>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

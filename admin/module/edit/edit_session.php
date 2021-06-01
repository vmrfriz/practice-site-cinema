<?php
    function hmformat($int) {
        return ($int < 10) ? '0'.$int : $int;
    }

    if(isset($_POST['update']))
    {
        $id = intval($_POST['id']);
        $film_id = intval($_POST['film_id']);
        $started_date = $_POST['started_date'];
        $started_h = intval($_POST['started_h']);
        $started_i = intval($_POST['started_i']);

        $started_at = date('Y-m-d H:i:s', strtotime($started_date . ' ' . hmformat($started_h) . ':' . hmformat($started_i)));

        $insert = fetch($conn, "UPDATE sessions SET started_at = '$started_at' WHERE id = '$id'");

        header("Location: ?layouts=sessions");
    }

    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $movies = fetchAll($conn, "SELECT * FROM films");
    $session = fetch($conn,"SELECT * FROM sessions WHERE id = '$id'");

    $DateTime = strtotime($session['started_at']);
    $started_date = date('Y-m-d', $DateTime);
    $started_h = intval(date('h', $DateTime));
    $started_i = intval(date('i', $DateTime));
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-row align-center mt-3">
            <label for="id">ID</label>
            <input id="id" class="input-edit" type="text" name="id" value="<?=$id ?>" placeholder="ID" readonly="readonly">
        </div>
        <div class="d-flex direction-row align-center mt-3">
            <label for="film_id">Фильм</label>
            <select class="input-edit" name="film_id" id="film_id" disabled="disabled">
                <?php
                foreach ($movies as $movie) {
                    ?>
                    <option value="<?php echo $movie['id']; ?>" <?=($session['film_id'] == $movie['id'] ? 'selected="selected"' : '') ?>><?php echo $movie['name'] . ' [' . $movie['id'] . ']'; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="d-flex direction-row align-center mt-3">
            <label for="started_date">Дата сеанса</label>
            <input id="started_date" class="input-edit" type="date" name="started_date" value="<?=$started_date ?>" placeholder="Дата сеанса" Required>
        </div>
        <div class="d-flex direction-row align-center mt-3">
            <label for="started_time">Время сеанса</label>
            <input id="started_time" class="input-edit mr-2" type="number" name="started_h" value="<?=$started_h ?>" min="0" max="23" size="3" placeholder="ЧЧ" Required>
            <input id="started_time" class="input-edit" type="number" name="started_i" value="<?=$started_i ?>" min="0" max="59" size="3" placeholder="ММ" Required>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>

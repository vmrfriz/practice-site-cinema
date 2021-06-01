<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $genre = fetch($conn,"SELECT * FROM genres WHERE id = '$id'");

if(isset($_POST['update']))
    {
        $title = $_POST['title'];
        $insert = fetch($conn,"UPDATE genres SET title = '$title' WHERE id = '$id'");

        header("Location: ?layouts=genres");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input id="id" class="input-edit" type="text" name="id" value="<?php echo $genre['id']; ?>" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="title">Название жанра:</label>
                <input id="title" class="input-edit" type="text" name="title" value="<?php echo $genre['title']; ?>" placeholder="Название жанра">
            </div>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>

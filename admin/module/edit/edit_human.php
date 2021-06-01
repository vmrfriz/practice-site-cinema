<?php
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $name = addslashes($_POST['name']);
        $photo = $_POST['photo'] ?: null;

        $insert = fetch($conn,"UPDATE humans SET name = '$name', photo = '$photo' WHERE id = '$id'");

        header("Location: ?layouts=humans");
    }

    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $human = fetch($conn,"SELECT * FROM humans WHERE id = '$id'");
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input id="id" class="input-edit" type="text" name="id" value="<?php echo $human['id']; ?>" placeholder="ID" readonly="readonly">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input id="name" class="input-edit" type="text" name="name" value="<?php echo $human['name']; ?>" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="photo">Фото</label>
                <input id="photo" class="input-edit" type="text" name="photo" value="<?php echo $human['photo']; ?>" placeholder="Фото">
            </div>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>

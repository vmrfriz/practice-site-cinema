<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $promocode = fetch($conn,"SELECT * FROM promocodes WHERE id = '$id'");

    if(isset($_POST['update']))
    {
        $code = $_POST['code'];
        $discount = $_POST['discount'];

        $edit = fetch($conn,"UPDATE promocodes SET code = '$code', discount = '$discount' WHERE id = '$id'");

        header("Location: ?layouts=promocodes");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input class="input-edit" type="text" name="id" value="<?php echo $promocode['id']; ?>" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="code">Код</label>
                <input class="input-edit" type="text" name="code" value="<?php echo $promocode['code']; ?>" placeholder="Код" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="discount">Скидка</label>
                <input class="input-edit" type="text" name="discount" value="<?php echo $promocode['discount']; ?>" placeholder="Скидка" Required>
            </div>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>


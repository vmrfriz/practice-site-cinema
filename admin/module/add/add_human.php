<?php
    if(isset($_POST['insert']))
    {
        $name = addslashes($_POST['name']);
        $photo = $_POST['photo'] ?: null;

        $insert = insert($conn,"INSERT INTO humans (id, name, photo) VALUES (NULL, '$name', '$photo')");

        header("Location: ?layouts=humans");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Имя</label>
                <input id="name" class="input-edit" type="text" name="name" value="" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="photo">Фото</label>
                <input id="photo" class="input-edit" type="text" name="photo" value="" placeholder="Фото">
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

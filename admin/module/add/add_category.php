<?php
    if(isset($_POST['insert']))
    {
        $name = $_POST['name'];

        $insert = insert($conn,"INSERT INTO categories (id, parent_id, name) VALUES (NULL, 0, '$name')");

        header("Location: ?layouts=categories");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input class="input-edit" type="text" name="id" value="" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input class="input-edit" type="text" name="name" value="" placeholder="Название" Required>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

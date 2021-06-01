<?php
    if(isset($_POST['insert']))
    {
        $title = addslashes($_POST['title']);
        $insert = insert($conn,"INSERT INTO genres (id, title) VALUES (NULL, '$title')");
        header("Location: ?layouts=genres");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center mt-3">
                <label for="title">Название</label>
                <input id="title" class="input-edit" type="text" name="title" value="" placeholder="Название" Required>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

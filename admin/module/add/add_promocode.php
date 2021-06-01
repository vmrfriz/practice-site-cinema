<?php
if(isset($_POST['insert']))
{
    $code = $_POST['code'];
    $discount = $_POST['discount'];

    $insert = insert($conn,"INSERT INTO promocodes (id, code, discount) VALUES (NULL, '$code', '$discount')");

    header("Location: ?layouts=promocodes");
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
                <label for="code">Код</label>
                <input class="input-edit" type="text" name="code" value="" placeholder="Код" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="discount">Скидка</label>
                <input class="input-edit" type="text" name="discount" value="" placeholder="Скидка" Required>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

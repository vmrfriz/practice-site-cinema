<?php
    $parents_list = fetchAll($conn,"SELECT * FROM categories WHERE parent_id = '0'");

    if(isset($_POST['insert']))
    {
        $parent = $_POST['parent'];
        $name = $_POST['name'];

        $insert = insert($conn,"INSERT INTO categories (id, parent_id, name) VALUES (NULL, '$parent', '$name')");

        header("Location: ?layouts=subcategories");
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
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Родительская</label>
                <select class="input-edit" name="parent" id="" required>
                    <?php
                        foreach ($parents_list as $list) {
                            ?>
                                <option value="<?php echo $list['id']; ?>"><?php echo $list['name']; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

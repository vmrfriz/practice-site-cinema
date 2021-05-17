<?php
    $category_list = fetchAll($conn,"SELECT * FROM categories");

    if(isset($_POST['insert']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $img = $_POST['imgName'];

        $insert = insert($conn,"INSERT INTO products (id, category_id, name, description, size, price, img) VALUES (NULL, '$category', '$name', '$description', 'XS', '$price', '../img/product/$img')");

        header("Location: ?layouts=products");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input id="id" class="input-edit" type="text" name="id" value="" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input id="name" class="input-edit" type="text" name="name" value="" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="description">Описание</label>
                <textarea class="input-edit" name="description" id="description" rows="10" cols="70" Required></textarea>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="category">Категория</label>
                <select class="input-edit" name="category" id="category" required>
                    <?php
                    foreach ($category_list as $list) {
                        ?>
                        <option value="<?php echo $list['id']; ?>"><?php echo $list['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="imgToUpload">Изображение</label>
                <input type="file" name="imgToUpload" id="imgToUpload" class="input-edit" value="">
                <input type="hidden" name="imgName" class="input-edit" id="imgName" required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="price">Цена</label>
                <input id="price" class="input-edit" type="text" name="price" value="" placeholder="Цена" Required>
            </div>
        </div>
        <input class="btn btn_green mt-3" type="submit" name="insert" value="Добавить">
    </form>
</div>

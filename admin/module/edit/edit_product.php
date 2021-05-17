<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $product = fetch($conn,"SELECT * FROM products WHERE id = '$id'");

    $category_id = $product['category_id'];
    $category = fetch($conn,"SELECT * FROM categories WHERE id = '$category_id'");

    $category_list = fetchAll($conn,"SELECT * FROM categories WHERE id != '$category_id'");

    if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category_update = $_POST['category'];
        $price = $_POST['price'];
        $img = $_POST['imgName'];

        if ($img) {
            $insert = fetch($conn,"UPDATE products SET name = '$name', description = '$description', category_id = '$category_update', price = '$price', img = '../img/product/$img' WHERE id = '$id'");
        } else {
            $insert = fetch($conn,"UPDATE products SET name = '$name', description = '$description', category_id = '$category_update', price = '$price' WHERE id = '$id'");
        }

        header("Location: ?layouts=products");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input id="id" class="input-edit" type="text" name="id" value="<?php echo $product['id']; ?>" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <textarea id="name" name="name" class="input-edit" rows="10" cols="70" placeholder="Название" Required><?php echo $product['name']; ?></textarea>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="description">Описание</label>
                <textarea class="input-edit" name="description" id="description" rows="10" cols="70" Required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="category">Категория</label>
                <select class="input-edit" name="category" id="category" required>
                    <option selected="selected" value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
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
                <input type="file" name="imgToUpload" id="imgToUpload" class="input-edit" value="<?php echo $product['img']; ?>">
                <input type="hidden" name="imgName" class="input-edit" id="imgName">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="price">Цена</label>
                <input id="price" class="input-edit" type="text" name="price" value="<?php echo $product['price']; ?>" placeholder="Цена" Required>
            </div>
        </div>
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>

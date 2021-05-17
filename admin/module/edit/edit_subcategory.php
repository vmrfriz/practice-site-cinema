<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];

    $category = fetch($conn,"SELECT * FROM categories WHERE id = '$id'");

    $parent_id = $category['parent_id'];
    $parent = fetch($conn,"SELECT * FROM categories WHERE id = '$parent_id'");

    $parents_list = fetchAll($conn,"SELECT * FROM categories WHERE parent_id = '0' AND NOT id IN ('$parent_id')");

    if(isset($_POST['update']))
    {
        $parent_update = $_POST['parent'];
        $name = $_POST['name'];

        $edit = fetch($conn,"UPDATE categories SET name = '$name', parent_id = '$parent_update' WHERE id = '$id'");

        header("Location: ?layouts=subcategories");
    }
?>

<div class="table-container">
    <form class="form-edit" method="POST">
        <div class="d-flex direction-column">
            <div class="d-flex direction-row align-center">
                <label for="id">ID:</label>
                <input class="input-edit" type="text" name="id" value="<?php echo $category['id']; ?>" placeholder="ID" disabled="disabled">
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Название</label>
                <input class="input-edit" type="text" name="name" value="<?php echo $category['name']; ?>" placeholder="Название" Required>
            </div>
            <div class="d-flex direction-row align-center mt-3">
                <label for="name">Родительская</label>
                <select class="input-edit" name="parent" id="" required>
                    <option selected="selected" value="<?php echo $parent['id']; ?>"><?php echo $parent['name']; ?></option>
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
        <input class="btn btn_orange mt-3" type="submit" name="update" value="Обновить">
    </form>
</div>


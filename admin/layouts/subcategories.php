<div class="table-container">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Родительская</th>
            <th>
                <a href="?layouts=add_<?php echo $title_chpu; ?>" class="btn btn_green">Добавить новую</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $categories = fetchAll($conn,"SELECT * FROM categories WHERE parent_id = 0");
        foreach ($categories as $category) {
            $id_categories = $category['id'];
            $subcategories = fetchAll($conn,"SELECT * FROM categories WHERE parent_id = '$id_categories'");
            foreach ($subcategories as $subcategory) {
            ?>
            <tr>
                <td><?echo $subcategory['id']; ?></td>
                <td><?echo $subcategory['name']; ?></td>
                <td><?echo $subcategory['parent_id']; ?></td>
                <td>
                    <a href="?layouts=edit_subcategory&id=<?echo $subcategory['id']; ?>" class="btn btn_orange" data-id="<?echo $category['id']; ?>">Редактировать</a>
                    <a class="btn btn_red delete_item" data-id="<?echo $subcategory['id']; ?>" data-item="categories">Удалить</a>
                </td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>
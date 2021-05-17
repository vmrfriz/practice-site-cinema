<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>
                    <a href="?layouts=add_<?php echo $title_chpu; ?>" class="btn btn_green">Добавить новую</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $categories = fetchAll($conn,"SELECT * FROM categories WHERE parent_id = 0");
                foreach ($categories as $category) {
            ?>
                <tr>
                    <td><?echo $category['id']; ?></td>
                    <td><?echo $category['name']; ?></td>
                    <td>
                        <a href="?layouts=edit_category&id=<?echo $category['id']; ?>" class="btn btn_orange" data-id="<?echo $category['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $category['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
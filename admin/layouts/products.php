<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>
                    <a href="?layouts=add_<?php echo $title_chpu; ?>" class="btn btn_green">Добавить новый</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $products = fetchAll($conn,"SELECT * FROM products");
                foreach ($products as $product) {
            ?>
                <tr>
                    <td><?echo $product['id']; ?></td>
                    <td><?echo $product['name']; ?></td>
                    <td><?echo $product['category_id']; ?></td>
                    <td>
                        <a href="?layouts=edit_product&id=<?echo $product['id']; ?>" class="btn btn_orange" data-id="<?echo $product['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $product['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="table-container">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Код</th>
            <th>Скидка</th>
            <th>
                <a href="?layouts=add_<?php echo $title_chpu; ?>" class="btn btn_green">Добавить новый</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $promocodes = fetchAll($conn,"SELECT * FROM promocodes");
        foreach ($promocodes as $promocode) {
            ?>
            <tr>
                <td><?echo $promocode['id']; ?></td>
                <td><?echo $promocode['code']; ?></td>
                <td><?echo $promocode['discount']; ?></td>
                <td>
                    <a href="?layouts=edit_promocode&id=<?echo $promocode['id']; ?>" class="btn btn_orange" data-id="<?echo $promocode['id']; ?>">Редактировать</a>
                    <a class="btn btn_red delete_item" data-id="<?echo $promocode['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
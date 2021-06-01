<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>
                    <a href="?layouts=add_human" class="btn btn_green">Добавить новый</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $humans = fetchAll($conn,"SELECT * FROM humans");
                foreach ($humans as $human) {
            ?>
                <tr>
                    <td><?echo $human['id']; ?></td>
                    <td>
                        <img src="<?=$human['photo'] ?>" alt="" width="20" height="20">
                        &nbsp;
                        <?echo $human['name']; ?>
                    </td>
                    <td>
                        <a href="?layouts=edit_human&id=<?echo $human['id']; ?>" class="btn btn_orange" data-id="<?echo $human['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $human['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
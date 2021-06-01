<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>
                    <a href="?layouts=add_genre" class="btn btn_green">Добавить новый</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $genres = fetchAll($conn,"SELECT * FROM genres");
                foreach ($genres as $genre) {
            ?>
                <tr>
                    <td><?echo $genre['id']; ?></td>
                    <td><?echo $genre['title']; ?></td>
                    <td>
                        <a href="?layouts=edit_genre&id=<?echo $genre['id']; ?>" class="btn btn_orange" data-id="<?echo $genre['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $genre['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
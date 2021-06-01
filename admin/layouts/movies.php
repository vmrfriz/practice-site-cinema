<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>
                    <a href="?layouts=add_movie" class="btn btn_green">Добавить новую</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $movies = fetchAll($conn,"SELECT * FROM films");
                foreach ($movies as $movie) {
            ?>
                <tr>
                    <td><?echo $movie['id']; ?></td>
                    <td><?echo $movie['name']; ?></td>
                    <td>
                        <a href="?layouts=edit_movie&id=<?echo $movie['id']; ?>" class="btn btn_orange" data-id="<?echo $movie['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $movie['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
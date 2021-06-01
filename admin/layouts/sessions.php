<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Фильм</th>
                <th>Дата и время сеанса</th>
                <th>
                    <a href="?layouts=add_session" class="btn btn_green">Добавить новый</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sessions = fetchAll($conn, "SELECT s.*, m.name FROM sessions AS s JOIN films AS m ON s.film_id = m.id");
                foreach ($sessions as $session) {
            ?>
                <tr>
                    <td><?echo $session['id']; ?></td>
                    <td><?echo $session['name']; ?></td>
                    <td><?echo $session['started_at']; ?></td>
                    <td>
                        <a href="?layouts=edit_session&id=<?echo $session['id']; ?>" class="btn btn_orange" data-id="<?echo $session['id']; ?>">Редактировать</a>
                        <a class="btn btn_red delete_item" data-id="<?echo $session['id']; ?>" data-item="<?echo $title_chpu; ?>">Удалить</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
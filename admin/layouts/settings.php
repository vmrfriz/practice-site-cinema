<?php
    $links = fetchAll($conn,"SELECT * FROM links");

    $qiwis = fetchAll($conn,"SELECT id, name, secret_key, public_key FROM payment WHERE name = 'Qiwi'");

    $yoomoneys = fetchAll($conn,"SELECT id, name, receiver FROM payment WHERE name = 'Yoomoney   '");


    if(isset($_POST['update_link']))
    {
        $link = $_POST['link'];
        $id = $_POST['id'];

        fetch($conn,"UPDATE links SET link = '$link' WHERE id = '$id'");

        header("Location: ?layouts=settings");
    }

    if(isset($_POST['update_qiwi']))
    {
        $id = $_POST['id'];
        $secret_key = $_POST['secret_key'];
        $public_key = $_POST['public_key'];

        fetch($conn,"UPDATE payment SET secret_key = '$secret_key', public_key = '$public_key' WHERE id = '$id'");

        header("Location: ?layouts=settings");
    }
    if(isset($_POST['update_yoomoney']))
    {
        $id = $_POST['id'];
        $receiver = $_POST['receiver'];

        fetch($conn,"UPDATE payment SET receiver = '$receiver' WHERE id = '$id'");

        header("Location: ?layouts=settings");
    }

if(isset($_POST['update_qiwi']))
{
    $id = $_POST['id'];
    $secret_key = $_POST['secret_key'];
    $public_key = $_POST['public_key'];

    fetch($conn,"UPDATE payment SET secret_key = '$secret_key', public_key = '$public_key' WHERE id = '$id'");

    header("Location: ?layouts=settings");
}
?>

<div class="settings">
    <div class="links">
        <h2 class="title">Ссылки</h2>
        <?php
            foreach ($links as $link){
                ?>
                    <form class="form-edit" method="POST">
                        <div class="d-flex direction-row">
                            <input class="input-edit" type="hidden" name="id" value="<?php echo $link['id']; ?>" placeholder="ID">
                            <div class="d-flex direction-row align-center mt-3">
                                <label for="name"><?php echo $link['name']; ?></label>
                                <input class="input-edit" type="hidden" name="name" value="<?php echo $link['name']; ?>" placeholder="Название" disabled>
                            </div>
                            <div class="d-flex direction-row align-center mt-3 mr-3">
                                <input class="input-edit" type="text" name="link" value="<?php echo $link['link']; ?>" placeholder="Ссылка" Required>
                            </div>
                            <input class="btn btn_orange mt-3" type="submit" name="update_link" value="Обновить">
                        </div>
                    </form>
                <?php
            }
        ?>
    </div>
    <div class="qiwi-settings mt-5">
        <h2 class="title">QIWI</h2>
        <?php
        foreach ($qiwis as $qiwi){
            ?>
                <form class="form-edit" method="POST">
                    <div class="d-flex direction-column">
                        <input class="input-edit" type="hidden" name="id" value="<?php echo $qiwi['id']; ?>" placeholder="ID">
                        <div class="d-flex direction-row align-center mt-3">
                            <label for="secret_key">Secret key</label>
                            <input id="secret_key" class="input-edit mr-3" type="text" name="secret_key" value="<?php echo $qiwi['secret_key']; ?>" placeholder="Secret key">
                        </div>
                        <div class="d-flex direction-row align-center mt-3 mr-3">
                            <label for="public_key">Public key</label>
                            <input id="public_key" class="input-edit mr-3" type="text" name="public_key" value="<?php echo $qiwi['public_key']; ?>" placeholder="Public key" Required>
                        </div>
                        <input class="btn btn_orange mt-3" type="submit" name="update_qiwi" value="Обновить">
                    </div>
                </form>
            <?php
        }
        ?>
    </div>
    <div class="yoomoney-settings mt-5">
        <h2 class="title">YooMoney</h2>
        <?php
        foreach ($yoomoneys as $yoomoney){
            ?>
            <form class="form-edit" method="POST">
                <div class="d-flex direction-column">
                    <input class="input-edit" type="hidden" name="id" value="<?php echo $yoomoney['id']; ?>" placeholder="ID">
                    <div class="d-flex direction-row align-center mt-3">
                        <label for="receiver">Получатель</label>
                        <input id="receiver" class="input-edit mr-3" type="text" name="receiver" value="<?php echo $yoomoney['receiver']; ?>" placeholder="Получатель">
                    </div>
                    <input class="btn btn_orange mt-3" type="submit" name="update_yoomoney" value="Обновить">
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</div>
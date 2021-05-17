<?php
    require($_SERVER["DOCUMENT_ROOT"] . '/admin/module/auth/login.php');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/styles.css" />

    <title>Авторизация</title>
</head>
    <body>
        <div class="login-container d-flex direction-column justify-center align-center">
            <h1>Авторизация администратора</h1>
            <div class="login">
                <form class="d-flex direction-column" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <h4 class="mt-3"><?php echo $msg; ?></h4>
                    <input type="text" class="mt-3" name="login" placeholder="Логин" required autofocus></br>
                    <input type="password" class="mt-3" name="password" placeholder="Пароль" required>
                    <button class="btn btn_green mt-3" type="submit" name="auth">Вход</button>
                </form>
            </div>
        </div>
    </body>
</html>

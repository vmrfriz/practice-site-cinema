<?php
    ob_start();
    session_start();

    require($_SERVER["DOCUMENT_ROOT"] . '/admin/config/db.php');

    $users = fetchAll($conn,"SELECT * FROM users WHERE privilege = 9");

    $msg = '';

    if (empty($_SESSION['login']) || $_SESSION['valid'] != 1) {
        if (isset($_POST['auth']) && !empty($_POST['login']) && !empty($_POST['password'])) {
            foreach ($users as $admin) {
                if ($admin['login'] == $_POST['login'] && $admin['password'] == $_POST['password']) {
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['valid'] = true;
                    header('Location: /admin/');
                } else {
                    $msg = 'Wrong username or password';
                }
            }
        }
    } else {
        header('Location: /admin/');
    }
?>


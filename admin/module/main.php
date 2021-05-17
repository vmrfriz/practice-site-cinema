<?php
    require($_SERVER["DOCUMENT_ROOT"] . '/admin/config/db.php');
    require($_SERVER["DOCUMENT_ROOT"] . '/admin/module/chpu.php');

    ob_start();
    session_start();

    if (empty($_SESSION['login']) || $_SESSION['valid'] != 1) {
        header('Location: /admin/layouts/login.php');
    }

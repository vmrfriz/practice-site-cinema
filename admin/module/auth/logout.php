<?php
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION['valid']);

    header('Location: /admin/');
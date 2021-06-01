<?php

    require($_SERVER["DOCUMENT_ROOT"] . '/admin/config/db.php');

    $id = $_POST['id'];
    $item = $_POST['item'];

    $delete = delete($conn,"DELETE FROM $item WHERE id = '$id'");
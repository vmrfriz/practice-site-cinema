<?php

$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/product';

if ($_POST['type'] == 'image') {
    $result = [];

    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['file']['tmp_name'];
        $name = basename($_FILES['file']['name']);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $result['name'] = $name;
    }

    echo json_encode($result);
}

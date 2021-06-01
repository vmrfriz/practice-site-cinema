<?php

if ($_POST['type'] == 'image') {
    $path = $_SERVER["DOCUMENT_ROOT"] . "/img/product/";
    $file = $_FILES['file']['name'];
    $tmpFile = $_FILES['file']['tmp_name'];

    $path = $path . $file;
    move_uploaded_file($tmpFile, $path);

    $count = count(file($path));

    echo json_encode(array('name' => $file));
}


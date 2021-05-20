<?php

$reservations = json_decode($_POST['order']);
$phone = addslashes($_POST['phone']);
$film_id = intval(Router::getNext());

$values = [];
foreach ($reservations as $reserv) {
    $row = intval($reserv->row);
    $seat = intval($reserv->seat);
    $values[] = "({$film_id}, {$row}, {$seat}, '{$phone}')";
}

$sql = 'INSERT INTO `films_reservations` (`film_id`, `row`, `seat`, `phone`) VALUES ' . implode(', ', $values);
$db_result = Database::getConnection()->query($sql);

header('Location: /thankyou/');

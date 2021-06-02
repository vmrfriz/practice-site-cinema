<?php

$reservations = json_decode($_POST['order']);
$phone = addslashes($_POST['phone']);
$session_id = intval($_POST['session_id']);

$values = [];
foreach ($reservations as $reserv) {
    $row = intval($reserv->row);
    $seat = intval($reserv->seat);
    $values[] = "({$session_id}, {$row}, {$seat}, '{$phone}')";
}

$sql = 'INSERT INTO `sessions_reservations` (`session_id`, `row`, `seat`, `phone`) VALUES ' . implode(', ', $values);
$db_result = Database::getConnection()->query($sql);

header('Location: /thankyou/');

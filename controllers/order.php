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
echo '<pre>' . var_export($sql, true) . '</pre>';
$db_result = Database::getConnection()->query($sql);
echo '<pre>' . var_export($db_result, true) . '</pre>';

// header('Location: /thankyou/');

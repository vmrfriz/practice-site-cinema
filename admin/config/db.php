<?php
    $config = include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

    try {
        $conn = new PDO("mysql:host=".$config['host'].";charset=utf8;dbname=".$config['base'], $config['user'], $config['pass']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8; SET CHARACTER SET utf8; SET SESSION collation_connection = utf8_general_ci;');
        return $conn;
    }

    catch(PDOException $e) {
        die($e->getMessage());
    }

    function fetchAll($conn, $sql) {
        $query = $conn->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function fetch($conn, $sql) {
        $query = $conn->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    function insert($conn, $sql) {
        $query = $conn->prepare($sql);
        $query->execute();
        return $query;
    }

    function delete($conn, $sql) {
        $query = $conn->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
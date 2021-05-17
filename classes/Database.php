<?php

class Database extends Singleton
{
    private $conn;

    public static function getInstance(): Singleton {
        $instance = parent::getInstance();
        if (!$instance->conn) {
            $instance->db_connect();
        }
        return $instance;
    }

    public static function getConnection() {
        return self::getInstance()->conn;
    }

    private function db_connect() {
        $config = include($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
        $this->conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['base']);
        if ($this->conn->connect_errno) {
            die("Database connection failed.");
        }
    }
}

<?php

if (floatval(phpversion()) < 7.1) {
    die('Для работы сайта необходима версия PHP между 7.1 и 7.4 включительно.');
}

require_once 'classes/autoload.php';

Router::route($_SERVER['REQUEST_URI']);

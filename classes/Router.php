<?php

class Router extends Singleton
{
    private $parts = [];

    public static function route($url) {
        $instance = self::getInstance();
        $instance->parts = array_filter(explode('/', $url));

        $file = current($instance->parts) ?: 'index';
        $controller_path = $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $file . '.php';

        if (file_exists($controller_path)) {
            require $controller_path;
        } else {
            http_response_code(404);
            include($_SERVER['DOCUMENT_ROOT'] . '/404.html');
        }
    }

    public static function getNext() {
        $instance = self::getInstance();
        return next($instance->parts);
    }
}

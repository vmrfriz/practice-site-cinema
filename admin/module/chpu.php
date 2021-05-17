<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $title_chpu = $params['layouts'];
    if ($title_chpu == 'categories') {
        $title = 'Категории';
    } elseif ($title_chpu == 'subcategories') {
        $title = 'Подкатегории';
    } elseif ($title_chpu == 'products') {
        $title = 'Товары';
    } elseif ($title_chpu == 'promocodes') {
        $title = 'Промокоды';
    } elseif ($title_chpu == 'edit_category') {
        $title = 'Редактирование категории';
    } elseif ($title_chpu == 'edit_subcategory') {
        $title = 'Редактирование подкатегории';
    } elseif ($title_chpu == 'edit_product') {
        $title = 'Редактирование товара';
    } elseif ($title_chpu == 'edit_promocode') {
        $title = 'Редактирование промокода';
    } elseif ($title_chpu == 'add_categories') {
        $title = 'Добавление категории';
    } elseif ($title_chpu == 'add_subcategories') {
        $title = 'Добавление подкатегории';
    } elseif ($title_chpu == 'add_products') {
        $title = 'Добавление товара';
    } elseif ($title_chpu == 'add_promocodes') {
        $title = 'Добавление промокода';
    } elseif ($title_chpu == 'settings') {
        $title = 'Основные настройки';
    } elseif (!$title_chpu) {
        $title = 'Категории';
    }
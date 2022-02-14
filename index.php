<?php
require_once 'functions.php';
require_once 'data.php';

session_start();
date_default_timezone_set('Europe/Moscow');

$main_content = include_template('templates/index.php', [
    'lots' => $lots
]);

$user = check_user();

$layout = include_template('templates/layout.php', [
    'title' => 'Главная',
    'is_auth' => $user['is_auth'],
    'user_name' => $user['user_name'],
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

<?php
require_once 'functions.php';
require_once 'data.php';

date_default_timezone_set('Europe/Moscow');

$main_content = include_template('templates/index.php', [
    'lots' => $lots
]);

$layout = include_template('templates/layout.php', [
    'title' => 'Главная',
    'is_auth' => (bool) rand(0, 1),
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

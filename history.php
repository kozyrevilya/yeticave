<?php
require_once 'functions.php';
require_once 'data.php';

$lots_history = isset($_COOKIE['lots_history']) ? json_decode($_COOKIE['lots_history']) : [];

$main_content = include_template('templates/history.php', [
    'lots' => $lots,
    'lots_history' => $lots_history
]);

$layout = include_template('templates/layout.php', [
    'title' => 'Лот',
    'is_auth' => (bool) rand(0, 1),
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

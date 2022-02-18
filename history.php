<?php
require_once 'functions.php';
require_once 'data.php';

$lots_history = isset($_COOKIE['lots_history']) ? json_decode($_COOKIE['lots_history']) : [];

$main_content = include_template('templates/history.php', [
    'lots' => $lots,
    'lots_history' => $lots_history
]);

$user = check_user();

$layout = include_template('templates/layout.php', [
    'title' => 'История просмотров',
    'is_auth' => $user['is_auth'],
    'user_name' => $user['user_name'],
    'user_avatar' => $user['user_avatar'],
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

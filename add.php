<?php
require 'functions.php';

$main_content = include_template('templates/add.php', []);

$layout = include_template('templates/layout.php', [
    'title' => 'Добавить лот',
    'is_auth' => (bool) rand(0, 1),
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

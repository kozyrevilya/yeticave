<?php
require 'functions.php';
require 'data.php';

$lot_id = $_REQUEST['lot_id'];

if (array_key_exists($lot_id, $lots)) {
    $main_content = include_template('templates/lot.php', [
        'lots' => $lots,
        'lot_id' => $lot_id
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
} else {
    http_response_code(404);
}

<?php
require 'functions.php';
require 'data.php';

$lot_id = $_REQUEST['lot_id'];

$lots_history = [];

if (array_key_exists($lot_id, $lots)) {
    if (isset($_COOKIE['lots_history'])) {
        $lots_history = json_decode($_COOKIE['lots_history']);
        if (!in_array($lot_id, $lots_history)) {
            array_push($lots_history, $lot_id);
        }
    } else {
        array_push($lots_history, $lot_id);
    }

    setcookie('lots_history', json_encode($lots_history), strtotime('tomorrow'));

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

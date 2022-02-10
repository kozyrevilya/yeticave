<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    var_dump($lot);

    $required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];

    $errors = [];

    foreach ($lot as $key => $value) {
        if (in_array($key, $required)) {
            if ($key == 'lot-rate' && !is_numeric($value)) $errors[$key] = 'Введите число';
            if ($key == 'lot-step' && !is_numeric($value)) $errors[$key] = 'Введите число';
            if (!$value) $errors[$key] = 'Заполните это поле';
        }
    }

    if ($lot['category'] == 'Выберите категорию') $errors['category'] = 'Заполните это поле';

    if (count($errors)) {
        $main_content = include_template('templates/add.php', [
            'lot' => $lot,
            'errors' => $errors
        ]);
    } else {
        $main_content = 'all works well';
    }
} else {
    $main_content = include_template('templates/add.php', []);
}


$layout = include_template('templates/layout.php', [
    'title' => 'Добавить лот',
    'is_auth' => (bool) rand(0, 1),
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

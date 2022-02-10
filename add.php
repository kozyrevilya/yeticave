<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $required = ['lot-name', 'message', 'photo', 'lot-rate', 'lot-step', 'lot-date'];
    $dict = [
        'lot-name' => 'Наименование',
        'category' => 'Категория',
        'message' => 'Описание',
        'photo' => 'Изображение',
        'lot-rate' => 'Начальная цена',
        'lot-step' => 'Шаг ставки',
        'lot-date' => 'Дата окончания торгов'
    ];
    $errors = [];

    foreach ($lot as $key => $value) {
        if (in_array($key, $required)) {
            if (!$value) {
                $errors[$dict[$key]] = 'Это поле надо заполнить';
            }
        }
    }

    if ($lot['category'] == 'Выберите категорию') $errors[$dict['category']] = 'Это поле надо заполнить';

    if (count($errors)) {
        $main_content = include_template('templates/add.php', ['errors' => $errors]);
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

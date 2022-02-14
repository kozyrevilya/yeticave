<?php
require 'functions.php';

session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

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

    if (isset($_FILES['photo']['name'])) {
        $tmp_name = $_FILES['photo']['tmp_name'];
        $path = $_FILES['photo']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);

        if ($file_type !== 'image/jpeg') {
            $errors['photo'] = 'Загрузите изображение в формате JPEG';
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
            $lot['path'] = $path;
        }
    }

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


$user = check_user();

$layout = include_template('templates/layout.php', [
    'title' => 'Добавить лот',
    'is_auth' => $user['is_auth'],
    'user_name' => $user['user_name'],
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

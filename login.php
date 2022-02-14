<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST;

    $required = ['email', 'password'];

    $errors = [];

    foreach ($user as $key => $value) {
        if (in_array($key, $required)) {
            if ($key == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) $errors[$key] = 'Введите корректный email';
            if (!$value) $errors[$key] = 'Заполните это поле';
        }
    }

    if (count($errors)) {
        $main_content = include_template('templates/login.php', [
            'user' => $user,
            'errors' => $errors
        ]);
    } else {
        header('Location: /index.php');
    }
} else {
    $main_content = include_template('templates/login.php', []);
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

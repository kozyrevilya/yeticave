<?php
require 'functions.php';
require_once 'userdata.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $required = ['email', 'password'];

    $errors = [];

    foreach ($form as $key => $value) {
        if (in_array($key, $required)) {
            if ($key == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) $errors[$key] = 'Введите корректный email';
            if (!$value) $errors[$key] = 'Заполните это поле';
        }
    }

    if (!count($errors) and $user = search_user_by_email($form['email'], $users)) {
        if (password_verify($form['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        } else {
            $errors['password'] = 'Неверный пароль';
        }
    } else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (count($errors)) {
        $main_content = include_template('templates/login.php', [
            'user' => $form,
            'errors' => $errors
        ]);
    } else {
        header('Location: /index.php');
        exit();
    }
} else {
    $main_content = include_template('templates/login.php', []);
}

$user = check_user();

$layout = include_template('templates/layout.php', [
    'title' => 'Вход',
    'is_auth' => $user['is_auth'],
    'user_name' => $user['user_name'],
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

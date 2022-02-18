<?php
require 'functions.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $form = $_POST;

    $required = ['email', 'password', 'name', 'contacts'];

    $errors = [];

    foreach ($form as $key => $value) {
        if (in_array($key, $required)) {
            if ($key == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) $errors[$key] = 'Введите корректный email';
            if (!$value) $errors[$key] = 'Заполните это поле';
        }
    }

    if (isset($_FILES['avatar']['name'])) {
        $tmp_name = $_FILES['avatar']['tmp_name'];
        $path = 'img/' . $_FILES['avatar']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);

        if ($file_type !== 'image/jpeg') {
            $errors['avatar'] = 'Загрузите изображение в формате JPEG';
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
            $form['avatar_path'] = $path;
        }
    }

    if (count($errors)) {
        $main_content = include_template('templates/sign-up.php', [
            'errors' => $errors,
            'form' => $form
        ]);
    } else {
        try {
            $sql = "INSERT INTO users VALUES (NULL, :email, :name, :password, :avatar, :contacts, NOW(), NOW())";
            $req = $pdo->prepare($sql);
            $req->execute([
                'email' => $form['email'],
                'name' => $form['name'],
                'password' => password_hash($form['password'], PASSWORD_DEFAULT),
                'avatar' => $form['avatar_path'],
                'contacts' => $form['contacts'],
            ]);

            header('Location: /login.php');
            exit();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
} else {
    $main_content = include_template('templates/sign-up.php', []);
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

<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=yeticave', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $error) {
    exit($error->getMessage());
}

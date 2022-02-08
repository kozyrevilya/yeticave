<?php
require_once 'functions.php';

$main_content = include_template('templates/index.php', [
    'lots' => [
        [
            'name' => '2014 Rossignol District Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 10999,
            'image_url' => 'img/lot-1.jpg'
        ],
        [
            'name' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 159999,
            'image_url' => 'img/lot-2.jpg'
        ],
        [
            'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => 'Крепления',
            'price' => 8000,
            'image_url' => 'img/lot-3.jpg'
        ],
        [
            'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => 'Ботинки',
            'price' => 10999,
            'image_url' => 'img/lot-4.jpg'
        ],
        [
            'name' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => 'Одежда',
            'price' => 7500,
            'image_url' => 'img/lot-5.jpg'
        ],
        [
            'name' => 'Маска Oakley Canopy',
            'category' => 'Разное',
            'price' => 5400,
            'image_url' => 'img/lot-6.jpg'
        ]
    ]
]);

$layout = include_template('templates/layout.php', [
    'is_auth' => (bool) rand(0, 1),
    'user_name' => 'Константин',
    'user_avatar' => 'img/user.jpg',
    'categories' => ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'],
    'page_content' => $main_content
]);

print $layout;

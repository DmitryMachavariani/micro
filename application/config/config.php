<?php
$config = [
    'components' => [
        'db' => [
            'class' => 'DataBase',
            'connect' => 'mysql:host=localhost;dbname=game;',
            'username' => 'root',
            'password' => '1752dima',
            'charset' => 'utf8'
        ],
        'router' => [
            'class' => 'Router'
        ],
        'app' => [
            'class' => 'Config',
            'name' => 'Моё приложение',
            'lang' => 'ru',
            'charset' => 'utf-8',
        ],
    ]
];
<?php
$config = [
    'components' => [
        'session' => [
            'class' => 'Session',
            'autoStart' => true
        ],
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
        'user' => [
            'class' => 'User'
        ],
        'app' => [
            'class' => 'Config',
            'name' => 'Моё приложение',
            'lang' => 'ru',
            'charset' => 'utf-8',
        ],
    ]
];
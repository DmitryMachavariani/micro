<?php
$config = [
    'language'=>'ru',
    'charset'=>'utf-8',
    'components'=>[
        'db'=>[
            'class'=>'DataBase',
            'connect'=>'mysql:host=localhost;dbname=game;',
            'username'=>'root',
            'password'=>'1752dima',
            'charset'=>'utf8'
        ],
        'router'=>[
            'class'=>'Router'
        ]
    ]
];
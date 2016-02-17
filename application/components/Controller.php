<?php

class Controller extends BaseController {
    //Перепределение контроллера и действие по умолчанию
    public static $default_base = 'site/login';

    public function run() {
//        echo time();

        return parent::run();
    }
}
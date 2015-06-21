<?php

class TestController extends Controller{
    public function index(){
        if(isset($_POST['name'])){
            $data = $_POST['name'];
        }

        $result = Sun::app()->get("db")->command("SELECT * FROM tb_users")->fetchAll();

        var_dump($result);

        $this->render('index', ['data' => $data]);
    }

    public function hello(){
        $this->render('hello', array('id' => 1));
    }
}
<?php

class TestController extends Controller{
    public function index(){
        if(isset($_POST['name'])){
            $data = $_POST['name'];
        }

//        $result = Rain::app()->get("db")->command("SELECT * FROM tb_users")->getAll();
//        $result = Rain::app()->get("db")->command("INSERT INTO tb_key(key_data, user_id, type)VALUES('423432432', '123121', 'activate')")->execute();
//        var_dump($result);

        $this->render('index', ['data' => $data]);
    }

    public function hello(){
        $this->render('hello', array('id' => 1));
    }
}
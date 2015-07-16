<?php

class SiteController extends Controller {

    public function index() {
        if (isset($_POST['name'])) {
            $data = $_POST['name'];
        }
//        $result = Rain::app()->get("db")->command("SELECT * FROM tb_users")->getAll();
//        $result = Rain::app()->get("db")->command("INSERT INTO tb_key(key_data, user_id, type)VALUES('423432432', '123121', 'activate')")->execute();
        $this->render('index', ['data' => $data]);
    }

    public function about() {
        $this->render('about');
    }

    public function login(){
        $this->render('login');
    }

    public function contact(){
        $this->render('contact');
    }
}
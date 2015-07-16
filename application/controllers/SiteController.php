<?php

class SiteController extends Controller {

    public function index() {

//        $result = Rain::app()->get("db")->command("SELECT * FROM tb_users")->getAll();
//        $result = Rain::app()->get("db")->command("INSERT INTO tb_key(key_data, user_id, type)VALUES('423432432', '123121', 'activate')")->execute();
        $this->render('index');
    }

    public function about() {
        $this->render('about');
    }

    public function login() {
        $users = [
            'admin'=>'admin'
        ];

        if (isset($_POST['send'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(array_key_exists($username, $users)){
                Rain::app()->user->login($username, $password);
                Rain::app()->session->setMessage('success', $username. ', вы успешно вошли');
            }
        }

        $this->render('login');
    }

    public function contact() {
        $this->render('contact');
    }

    public function logout(){
        if(Rain::app()->user->logout()){
            echo 'Good';
        }
    }
}

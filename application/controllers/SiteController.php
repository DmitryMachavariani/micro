<?php

class SiteController extends Controller {
    public function index() {
        $this->render('index');
    }

    public function about() {
        $this->render('about');
    }

    public function login() {
        //Получить хеш можно с помощью Rain::app()->user->passwordHash('admin');
        $users = [
            'admin' => '$2y$10$0sNcjChj/QVJwcRF7GBTc.nYAlytZwKFF.EcpJ7MEqoKKHIclbtqW'
        ];

        if ($form = FormHelper::load('rain-form-0')) {
            $username = $form['username'];
            $password = $form['password'];

            if (array_key_exists($username, $users)) {
                if (Rain::app()->user->verifyPassword($password, $users[$username])) {
                    Rain::app()->user->login($username, $password);
                    Rain::app()->session->setMessage('success', $username . ', вы успешно вошли');
                } else {
                    Rain::app()->session->setMessage('error', 'Вы указали неверный пароль');
                }

                Rain::app()->router->refresh();
            }
        } else {
            $this->render('login');
        }
    }

    public function contact() {
        $this->render('contact');
    }

    public function logout() {
        Rain::app()->user->logout();
        Rain::app()->router->redirect('site/index');
    }
}

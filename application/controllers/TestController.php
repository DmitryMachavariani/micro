<?php
class TestController extends Controller{
    public function index(){
        $data = 1;

        if(isset($_POST)){
            $data = time();
        }

        $this->render('index', ['data'=>$data]);
    }

    public function hello(){
    	$this->render('hello', array('id'=>1));
    }
}
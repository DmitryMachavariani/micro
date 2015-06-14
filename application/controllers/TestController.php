<?php
class TestController extends Controller{
    public function index(){
        if(isset($_POST['name'])){
            $data = $_POST['name'];
        }

        $this->render('index', ['data'=>$data]);
    }

    public function hello(){
    	$this->render('hello', array('id'=>1));
    }
}
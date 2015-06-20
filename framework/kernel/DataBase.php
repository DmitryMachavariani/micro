<?php

class DataBase{
    private $username;
    private $password;
    private $encoding;

    protected $database;


    public function run($config){
        if(isset($config['username'])) $this->username = $config['username'];

        if(isset($config['password'])) $this->password = $config['password'];

        if(isset($config['encoding'])) $this->encoding = $config['encoding'];

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try{
            $this->database = new PDO($config['connect'], $this->username, $this->password, $opt);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function command($command){
        echo $command;
//        try{
//            $query = $this->database->query($command)->fetch();
//        }catch(PDOException $e){
//            die($e->getMessage());
//        }
    }
}
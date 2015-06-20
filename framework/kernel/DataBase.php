<?php

class DataBase extends Sun{
    private $connect;
    private $username;
    private $password;
    private $encoding;

    protected $database;

    private $result;

    public function __construct($config){
        if(isset($config['connect'])) $this->connect = $config['connect'];
        if(isset($config['username'])) $this->username = $config['username'];
        if(isset($config['password'])) $this->password = $config['password'];
        if(isset($config['encoding'])) $this->encoding = $config['encoding'];

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try{
            $this->database = new PDO($this->connect, $this->username, $this->password, $opt);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function command($command, $params = NULL){
        try{
            $this->result = $this->database->query($command);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function fetchAll(){
        return $this->result->fetchAll();
    }
}
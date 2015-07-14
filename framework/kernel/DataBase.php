<?php

class DataBase{
    private $connect;
    private $username;
    private $password;
    private $encoding;

    protected $database;

    private $_new = true;
    private $result, $command;

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

    //Построение команды
    //Доработать
    public function command($command, $params = []){
        try{
            $this->result = $this->database->query($command);
            $this->command = $command;
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $this;
    }

    //Для получения всех данных удовлетворяющих запросу
    public function getAll(){
        return $this->result->fetchAll();
    }

    //Выполняет запросы типа UPDATE и INSERT
    public function execute(){
        return $this->database->prepare($this->command);
    }
}
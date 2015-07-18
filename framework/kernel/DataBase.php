<?php

/**
 * Class DataBase
 */
class DataBase extends Component {
    private $connect;
    private $username;
    private $password;
    private $encoding;

    protected $database;

    private $_new = true;
    private $result, $command;

    public function __construct($config) {
        if (isset($config['connect'])) $this->connect = $config['connect'];
        if (isset($config['username'])) $this->username = $config['username'];
        if (isset($config['password'])) $this->password = $config['password'];
        if (isset($config['encoding'])) $this->encoding = $config['encoding'];

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            $this->database = new PDO($this->connect, $this->username, $this->password, $opt);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Построение команды
    //Доработать
    /**
     * @param $command
     * @param array $params
     *
     * @return $this
     */
    public function command($command, $params = []) {
        try {
            $this->result = $this->database->query($command);
            $this->command = $command;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $this;
    }

    //Для получения всех данных удовлетворяющих запросу. Выбирает все записи
    //$from - LIMIT от
    //$to - LIMIT до
    public function get($table_name = null, $from = null, $to = null) {
        $this->result = $this->database->query("SELECT * FROM " . $table_name . " LIMIT " . $from . ", " . $to)->fetchAll();

        return $this->result;
    }

    public function getResult(){
        $this->result = $this->database->query($this->command)->fetchAll();

//        echo $this->command;
        return $this->result;
    }

    //Для получения всех данных удовлетворяющих запросу. Выбирает одну запись
    public function getOne($table_name) {
        if($this->command != null){
            $this->result = $this->database->query($this->command)->fetch();
        }else {
            $this->result = $this->database->query("SELECT * FROM " . $table_name . " LIMIT 1")->fetch();
        }

        return $this->result;
    }

    //Выполняет запросы типа UPDATE и INSERT
    public function execute() {
        return $this->database->prepare($this->command);
    }

    //Добавляет конструкцию типо SELECT *
    public function select($select = '*') {
        $this->command = 'SELECT * ';
        return $this;
    }

    //Добавляет конструкцию типо FROM {$from}
    public function from($from) {
        $this->command .= ' FROM ' . $from;
        return $this;
    }

    // Добавляетконструкцию типо WHERE
    // если $where массив, то перебирает в цикле
    public function where($where = null) {
        if (is_string($where) && $where != null) {
            $this->command .= ' WHERE ' . $where;
        } else if (is_array($where) && count($where) > 0) {
            $this->command .= ' WHERE ';
            $num = 0;
            foreach ($where as $key => $value) {
                $this->command .= $key . '="' . $value.'"';
                if($num < count($where) - 1){
                    $this->command .= ' AND ';
                }
                $num++;
            }
        }

        return $this;

    }

    // Выводит запрос как текст
    public function asText() {
        return $this->command;
    }
}
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
    //$table_name - название таблицы
    //$from - LIMIT от
    //$to - LIMIT до
    public function get($table_name = null, $from = null, $to = null) {
        try {
            $this->result = $this->database->query("SELECT * FROM " . $table_name . " LIMIT " . $from . ", " . $to)->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $this->result;
    }

    //Если команда подготовлена конструктором
    //То просто выполняем
    public function getResult() {
        try {
            $this->result = $this->database->query($this->command)->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $this->result;
    }

    //Для получения всех данных удовлетворяющих запросу. Выбирает одну запись
    //$table_name - название таблицы
    public function getOne($table_name) {
        try {
            $this->result = $this->database->query("SELECT * FROM " . $table_name . " LIMIT 1")->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $this->result;
    }

    //Выполняет запросы типа UPDATE и INSERT
    public function execute() {
        try {
            return $this->database->exec($this->command);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
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
    public function where($where = null, $type = 'AND') {
        if (is_string($where) && $where != null) {
            $this->command .= ' WHERE ' . $where;
        } else if (is_array($where) && count($where) > 0) {
            $this->command .= ' WHERE ';
            $num = 0;
            foreach ($where as $key => $value) {
                $this->command .= '`' . $key . '` = ';
                if (is_int($value)) {
                    $this->command .= $value;
                } else {
                    $this->command .= '"' . $value . '"';
                }

                if ($num < count($where) - 1) {
                    $this->command .= ' ' . $type . ' ';
                }
                $num++;
            }
        }

        return $this;

    }

    // Запрос типа UPDATE
    // в качестве аргумента передаётся название таблицы
    public function update($table) {
        if (is_string($table)) {
            $this->command = 'UPDATE ' . $table;
        }

        return $this;
    }

    // Устанвливаем параметры которые нужно передать
    // Добавлаяет блок SET
    public function set($param = []) {
        $this->command .= ' SET ';
        $num = 0;

        foreach ($param as $key => $value) {
            if (is_int($value))
                $this->command .= '`' . $key . "`=" . $value . "";
            else
                $this->command .= '`' . $key . '`="' . $value . '"';

            if(count($param) - 1 > $num){
                $this->command .= ', ';
            }

            $num++;
        }

        return $this;
    }


    // Выводит запрос как текст
    public function asText() {
        return $this->command;
    }
}
<?php

class Component {

    // Список классов для автозагрузки
    private $_class = [
        'BaseController' => '/base/BaseController.php',
        'BaseValidator' => '/base/BaseValidator.php',
        'IntValidator' => '/validator/IntValidator.php',
        'RangeValidator' => '/validator/RangeValidator.php',
        'Router' => '/kernel/Router.php',
        'FormHelper' => '/helper/FormHelper.php',
    ];

    // В конструкторе вызываем метод автозагрузки
    public function __construct() {
        $this->autoload();
    }

    private function autoload() {
        foreach ($this->_class as $key => $value) {
            $this->createComponent($key);
        }
    }

    // Создаёт компонент. Если класс абстрактный, то просто подключает,
    // если нет, то возвращает экземпляр класса
    public function createComponent($name, $param = null) {
        if (isset($this->_class[$name])) {
            $file = framework . $this->_class[$name];
            if (is_file($file)) {
                if (!class_exists($name)) {
                    require_once($file);
                    $class = new ReflectionClass($name);

                    if (!$class->isAbstract()) {
                        if($param === null) {
                            return new $name;
                        }else{
                            return new $name($param);
                        }
                    }
                }
            }
        }
    }
}
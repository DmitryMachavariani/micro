<?php

class Component {

    // Список классов для автозагрузки
    private $_class = [
        'BaseController' => '/base/BaseController.php',
        'BaseValidator' => '/base/BaseValidator.php',
        'IntValidator' => '/validator/IntValidator.php',
        'RangeValidator' => '/validator/RangeValidator.php',
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

    public function createComponent($name) {
        if (isset($this->_class[$name])) {
            $file = framework . $this->_class[$name];
            if (is_file($file)) {
                if (!class_exists($name)) {
                    require_once($file);
                    $class = new ReflectionClass($name);

                    if (!$class->isAbstract()) {
                        return new $name;
                    }
                }
            }
        }
    }
}
<?php

class FormHelper {
    private static $_id;

    public static function begin($method = 'post', $url = '', $param = null) {
        if ($url === '') {
            $url = Rain::app()->router->createUrl(Controller::getController() . '/' . Controller::getAction());
        }

        if (self::$_id === null) {
            self::$_id = 0;
        } else {
            self::$_id++;
        }

        $form = '<form action="' . $url . '" method="' . $method . '" name="rain-form-' . self::$_id . '"';
        if ($param !== null && is_array($param)) {
            foreach ($param as $key => $value) {
                $form .= ' ' . $key . '="' . $value . '"';
            }
        }

        $form .= ">";

        return $form;
    }

    public static function end() {
        return "</form>";
    }

    public static function input($name, $value, $param = null) {
        $input = '<input name="rain-form-' . self::$_id . '[' . $name . ']" value="' . $value . '"';

        if ($param !== null && is_array($param)) {
            if (!isset($param['type'])) {
                $param['type'] = 'text';
            }

            foreach ($param as $key => $value) {
                $input .= ' ' . $key . '="' . $value . '"';
            }
        }

        $input .= ">";

        return $input;
    }

    public static function submit($value, $param = null) {
        $param['type'] = 'submit';
        return self::input('', $value, $param);
    }

    public static function load($name) {
        return isset($_POST[$name]) ? $_POST[$name] : null;
    }
}
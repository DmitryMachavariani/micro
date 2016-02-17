<?php

class FormHelper {
    private static $_id;

    public static function begin($method = 'post', $url = '', $option = null) {
        if ($url === '') {
            $url = Rain::app()->router->createUrl(Controller::getController() . '/' . Controller::getAction());
        }

        if (self::$_id === null) {
            self::$_id = 0;
        } else {
            self::$_id++;
        }

        $form = '<form action="' . $url . '" method="' . $method . '" name="rain-form-' . self::$_id . '"';
        if ($option !== null && is_array($option)) {
            foreach ($option as $key => $value) {
                $form .= ' ' . $key . '="' . $value . '"';
            }
        }

        $form .= ">";

        return $form;
    }

    public static function end() {
        return "</form>";
    }

    public static function input($name, $value = null, $option = null) {
        $input = '<input name="rain-form-' . self::$_id . '[' . $name . ']" value="' . $value . '"';

        if ($option !== null && is_array($option)) {
            if (!isset($option['type'])) {
                $option['type'] = 'text';
            }

            foreach ($option as $key => $value) {
                $input .= ' ' . $key . '="' . $value . '"';
            }
        }

        $input .= ">";

        return $input;
    }

    public static function submit($value = '', $option = null) {
        $option['type'] = 'submit';
        if ($value === '') {
            $value = 'Submit';
        }
        return self::input('', $value, $option);
    }

    public static function load($name) {
        return isset($_POST[$name]) ? $_POST[$name] : null;
    }

    public static function label($name, $option = null) {
        $label = "<label";

        if ($option !== null && is_array($option)) {
            foreach ($option as $key => $value) {
                $label .= ' ' . $key . '="' . $value . '"';
            }
        }

        $label .= ">" . $name . "</label>";

        return $label;
    }

    public static function img($src, $alt = '', $option = []) {
        $image = "<img src=\"" . $src . "\" alt=\"" . $alt . "\"";

        if ($option !== null && is_array($option)) {
            foreach ($option as $key => $value) {
                $image .= ' ' . $key . '="' . $value . '"';
            }
        }
        $image .= ">";

        return $image;
    }
}

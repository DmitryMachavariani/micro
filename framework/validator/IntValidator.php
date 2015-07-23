<?php

class IntValidator extends BaseValidator {
    public static function validate($value) {
        if (is_int($value)) {
            return true;
        } else {
            return false;
        }
    }
}
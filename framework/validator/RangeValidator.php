<?php

class RangeValidator extends BaseValidator {
    public static function validate($min, $max, $value){
        return $value >= $min && $value <= $max;
    }
}
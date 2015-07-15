<?php

class Config {

    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function get($name) {
        if (array_key_exists($name, $this->config)) {
            return $this->config[$name];
        }
    }

}
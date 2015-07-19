<?php

class Logger extends Component {
    private $_logs = [];

    public function add($text) {
        array_push($this->_logs, $text);
    }

    public function extract() {
        return $this->_logs;
    }
}
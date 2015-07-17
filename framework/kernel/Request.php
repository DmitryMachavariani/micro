<?php

class Request extends Component{
    public function getPost($key) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
    }

    public function getQuery($key) {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
    }
}
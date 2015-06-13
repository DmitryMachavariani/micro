<?php
class Router{
	public function getPost($key){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}
	}

	public function getQuery($key){
		if(isset($_GET[$key])){
			return $_GET[$key];
		}
	}

	public function createUrl($data){
		$tmp_data = explode('/', $data);
		$to_query = array("d"=>$tmp_data);
		$url = http_build_query($to_query);

		echo $url;
	}
}
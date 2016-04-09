<?php

//class Router from processing route url
final class Router extends ExClassCore{

	private static $_req_method = null;
	private static $_route = null;
	private static $_page_name = null;
	private static $_tmp_route = ROOT.'/config/routes.php';

	//main method proccesing route
	//method given path to config file
	//method return handle val $handler_val (shape PageController@getIndex)
	//method return url params ($url_array => array)
	public static function getHandlerRoute($path_conf = null){

		self::$_req_method = strtolower($_SERVER["REQUEST_METHOD"]);

		if(!empty($path_conf))
			self::$_tmp_route = $path_conf;

		$req_url = $_SERVER['REQUEST_URI'];
		$handler_url = null;
		$route_array = SArray::getArrayFromFile(self::$_tmp_route);
		$url_array = SArray::getFilterExArray('/', $req_url);

		if(empty($url_array))
			$url_array[] = '/';

		self::$_page_name = self::$_req_method.':'.array_shift($url_array);

		//serch handler val in array config file
		foreach($route_array as $key_r => $value_r){
			if($key_r == self::$_page_name)
				$handler_val = $value_r;
		}

		if(!empty($handler_val))
			return array($handler_val, $url_array);
		else if(file_exists('404.php'))
			die(include_once '404.php');
		else
			die(SHtml::styleError('Sorry... Page Non Found!'));
			
	}

	//method get path config file routes
	public static function getTmpRoute(){

		return self::$_tmp_route;
	}

	//method return Request Method
	public static function getReqMethod(){

		return self::$_req_method;
	}

	//method set path config file routes
	public static function setTmpRoute($tmp_route){

		self::$_tmp_route = $tmp_route;
	}
}
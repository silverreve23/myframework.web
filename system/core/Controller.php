<?php
namespace system\core;

use system\core\ExClassCore;
use system\libs\{LA, LC};

use Exception;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//class controller (core)
//class extends ExClassCore (ex_class_core.php)
final class Controller extends ExClassCore{

	//method return handler controller of url
	//method given array ($handler_route => string) and url parrams ($url_params -> array)
	//method define given params of method Router::getHandlerRoute()
	//methon return array (view path and array result)
	//method return array of handler controller method
	public static function getHandlerController(string $handler_route, array $url_params){

		//get explode srting on array 
		$ex_handler_array = LA::getFilterExArray('@', $handler_route);

		$file_inc_c = ROOT.'/controllers/'.ucfirst($ex_handler_array[0]).'.php';

		//include extends controller
		if(file_exists(ROOT.'/controllers/ExController.php'))
			include_once ROOT.'/controllers/ExController.php';

		//include file handler controller
		if(file_exists($file_inc_c))
			include_once $file_inc_c;
		else
			throw new Exception("Error Include File Controller ".$ex_handler_array[0], 6);

		//set parrams for working of the LibController::getValOfGetParams
		LC::setParams($url_params);

		$call_object = ucfirst($ex_handler_array[0]);
		$call_method = $ex_handler_array[1];

		if(!method_exists($call_object, $call_method))
			throw new Exception("Error Call Method $call_object::$call_method", 1);

		return $call_object::$call_method();
	}
	
}
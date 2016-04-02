<?php

//class controller (core)
//class extends ExClassCore (ex_class_core.php)
class Controller extends ExClassCore{

	//method return handler controller of url
	//method given array ($handler_route => array) and url parrams ($url_params)
	//method define given params of method Router::getHandlerRoute()
	//methon return array (view path and array result)
	//method return array of handler controller method
	public static function getHandlerController($handler_route, $url_params){

		$ex_handler_array = SArray::getFilterExArray('@', $handler_route);

		$file_inc_c = ROOT.'/controllers/'.ucfirst($ex_handler_array[0]).'.php';

		//include extends controller
		if(file_exists(ROOT.'/controllers/ExController.php'))
			include_once ROOT.'/controllers/ExController.php';

		//include file handler controller
		if(file_exists($file_inc_c))
			include_once $file_inc_c;
		else
			throw new Exception("Error Include File Controller", 6);

		//set parrams for working of the LibController::getValOfGetParams
		LibController::setParams($url_params);

		$call_object = ucfirst($ex_handler_array[0]);
		$call_method = $ex_handler_array[1];

		if(!method_exists($call_object, $call_method))
			throw new Exception("Error Call Method $call_object::$call_method", 1);
			

		return $call_object::$call_method();
	}
	
}
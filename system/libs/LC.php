<?php
namespace system\libs;

use Exception;
//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//lib for work with the controller processing page 
class LC{

	private static $_params; 
	
	//method processing url params (return value get)
	//method given count params
	public function getValOfGetParams(int $count = null){

		if(empty($count))
			throw new Exception('Error Given Count Params', 5);

		for($i = 0; $i < $count; $i++){

			$ex_var_g[] = (array_key_exists($i, self::$_params)) ? self::$_params[$i] : null;	
		}

		return $ex_var_g;
	}

	//method processing post params (return value post)
	//mthod given name variable
	public function getValOfPostParams(array $arr_names){

		if(empty($arr_names))
			throw new Exception('Empty given array in getValOfPostParams', 7);

		if(!is_array($arr_names))
			throw new Exception('Given Non Array getValOfPostParams', 9);

		if(!isset($_POST) or empty($_POST))
			throw new Exception('Empty array POST[]', 8);

		foreach($arr_names as $arr_n_v){

			$ex_var_p[] = (array_key_exists($arr_n_v, $_POST)) ? $_POST[$arr_n_v] : null;	
		}

		return $ex_var_p;
	}

	//required method for working this is getValOfGetParams
	//method given array url params
	public static function setParams(array $params){
		self::$_params = $params;
	}

}
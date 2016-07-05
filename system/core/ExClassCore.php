<?php
namespace system\core;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//class extends core
class ExClassCore{
	private function __construct(){}

	//call to !isset method
	public function __call($name_m, array $params){

		throw new Exception("Error No Isset Method: $name_m()", 17);
		return;
	}
	
	//call to !isset static method
	public static function __callStatic($name_m, array $params){

		throw new Exception("Error No Isset Static Method: $name_m()", 17);
		return;
	}

	//get !isset property
	public function __get($name_p) {

		throw new Exception("Error No Isset Property: $name_p", 18);
		return;
	}

	//set !isset property
	public function __set($name_p, $val) {

		throw new Exception("Error No Isset Property: $name_p", 19);
		return;
	}
}
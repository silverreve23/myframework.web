<?php
namespace system\libs;
use Exception;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//class lib realize session
class LS{
	
	//method init session start
	public static function init(){

		@session_start();
		return;
		
	} 

	//method return session value 
	//method given name var
	public static function getVar($name_var = null){

		@session_start();

		return (isset($_SESSION[$name_var])) ? $_SESSION[$name_var] : null;
	}

	//method set session value 
	//method given name var and vals
	public static function setVar($name_var = null, $val_var = null){

		@session_start();

		if(!empty($name_var))
			if(is_string($name_var))
				$_SESSION[$name_var] = $val_var;
			else
				throw new Exception("Error Given No String", 16);
		return;
				
	}

	//method destroy session
	public static function dest(){

		@session_start();

		unset($_SESSION);
		@session_destroy();
		return;
	}
}
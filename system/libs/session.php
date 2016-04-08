<?php

//class lib realize session
class Session{
	
	//method init session start
	public static function init(){

		@session_start();
	} 

	//method return session value 
	//method given name var
	public static function getVar($name_var = null){

		return (isset($_SESSION[$name_var])) ? $_SESSION[$name_var] : null;
	}

	//method set session value 
	//method given name var and vals
	public static function setVar($name_var = null, $val_var = null){

		if(!empty($name_var))
			if(is_string($name_var))
				$_SESSION[$name_var] = $val_var;
			else
				throw new Exception("Error Given No String", 16);
				
	}

	//method destroy session
	public static function dest(){

		unset($_SESSION);
		@session_destroy();
	}
}
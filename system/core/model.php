<?php

//class Model for processing result mysql query
class Model{

	private static $_tmp_mysql = ROOT.'/config/mysql.php';
	private static $_strq = null;
	public static $db_connect = null;
	public static $db_result = null;
	
	//connecting database
	//method given path config mysql
	//method return object db_connect mysqli
	public static function getConnect($path_conf = null){

		//check if empty path to config mysql file
		if(!empty($path_conf))
			self::$_tmp_mysql = $path_conf;

		$mysql_array = SArray::getArrayFromFile(self::$_tmp_mysql);
		$arr_mysql_compare = ['db:host', 'db:user', 'db:pass', 'db:name'];

		if(!SArray::getKeysExists($arr_mysql_compare, $mysql_array))
			throw new Exception("Error Config File MySQL", 14);
			
		//create object mysqli of val config file mysql
		self::$db_connect = new mysqli($mysql_array['db:host'],
							           $mysql_array['db:user'],
							           $mysql_array['db:pass'],
							           $mysql_array['db:name']); 

		if(self::$db_connect->connect_errno)
			throw new Exception("Error Connect DataBase".mysqli_connect_error(), 9);

		return self::$db_connect;
	}

	//method return result query database
	//method given str query in shape select:from:...
	//if str query contains false value then this is parametr non  
	public static function getResult($q){

		//check given string on empty
		if(!empty($q))
			$qar = SArray::getFilterExArray(':', htmlspecialchars($q));
		else
			throw new Exception("Error String Query", 11);

		//parse str query of mysql
		if(!is_array($qar) or (count($qar) != 7))
			throw new Exception("Error Given Query String", 12);
			
		$qar[2] = ($qar[2] != 'false') ? 'WHERE '.$qar[2] : $qar[2] = null;
		$qar[3] = ($qar[3] != 'false') ? 'GROUP BY '.$qar[3] : $qar[3] = null;
		$qar[6] = ($qar[6] != 'false') ? 'LIMIT '.$qar[6] : $qar[6] = null;

		self::$_strq = "SELECT $qar[0]
						FROM $qar[1]
						$qar[2]
						$qar[3]
						ORDER BY $qar[4]
						$qar[5]
						$qar[6]";

		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_result = self::$db_connect->query(self::$_strq);

		if(empty(self::$db_result) or !isset(self::$db_result))
			throw new Exception("Error Query DataBase", 10);
			
		return self::$db_result;
	}

	//method return array one row of mysql query
	//method given arrType
	public static function getRow($arrType = MYSQLI_ASSOC){

		//check if object and empty database result
		if(is_object(self::$db_result) and !empty(self::$db_result))
				$arr = self::$db_result->fetch_array($arrType);

		else throw new Exception("Error Get Row From DataBase", 13);
		

		$arrResult[] = (!empty($arr) and isset($arr)) ? $arr : null;

			return $arrResult;
	}

	//method return array all rows of mysql query
	//method given arrType
	public static function getAllRows($arrType = MYSQLI_ASSOC){

		//check if object and empty database result
		if(is_object(self::$db_result) and !empty(self::$db_result))

			//fill $arrAll all colums result
			while($arr = self::$db_result->fetch_array($arrType))
				$arrAll[] = $arr;

		else throw new Exception("Error Get Rows From DataBase", 13);

			self::freeResult();

			return (!empty($arrAll)) ? $arrAll: null;
	}
	
	//method return str query
	public static function getStrQ(){

		return self::$_strq;
	}

	//method free result mysql
	public static function freeResult(){

		if(is_object(self::$db_result) and !empty(self::$db_result))
			self::$db_result->free();

			self::$db_result = null;
	}

	//method close connect mysql
	public static function closeConnect(){
		
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_connect->close();

		self::freeResult();
		self::$db_connect = null;
	}

	//main method Model::loadModel
	//method given array ($handler_route => array) and ($path_conf path config file) 
	//method include file handler model
	public static function loadModel($handler_route, $path_conf){

		//connect to database mysql
		self::$db_connect = self::getConnect($path_conf);

		//get array filter of '@' from handler route
		$ex_mysql_array = SArray::getFilterExArray('@', $handler_route);

		$file_inc_m = ROOT.'/models/'.ucfirst(str_replace('Controller',
														  'Model', 
														   $ex_mysql_array[0])).'.php';

		//include file handle model
		if(file_exists($file_inc_m))
			include_once $file_inc_m;
	}
}
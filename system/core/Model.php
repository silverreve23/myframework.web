<?php

namespace system\core;

use system\core\ExClassCore;
use system\libs\LA;
use mysqli;
use Exception;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//class Model for processing result mysql query
final class Model extends ExClassCore{

	private static $_tmp_mysql = ROOT.'/config/mysql.php',
				   $_strq_select = null,
				   $_strq_up = null,
				   $_strq_add = null,
				   $_strq_del = null,
				   $db_connect = null,
				   $db_result = null,
				   $db_update = null,
				   $db_add = null,
				   $db_del = null;
	
	//connecting database
	//method given path config mysql
	//method return object db_connect mysqli
	public static function getConnect($path_conf = null){

		//check if empty path to config mysql file
		if(!empty($path_conf))
			self::$_tmp_mysql = $path_conf;

		$mysql_array = LA::getArrayFromFile(self::$_tmp_mysql);
		$arr_mysql_compare = ['db:host', 'db:user', 'db:pass', 'db:name'];

		if(!LA::getKeysExists($arr_mysql_compare, $mysql_array))
			throw new Exception("Error: Config File MySQL", 14);
			
		//create object mysqli of val config file mysql
		self::$db_connect = new mysqli($mysql_array['db:host'],
							           $mysql_array['db:user'],
							           $mysql_array['db:pass'],
							           $mysql_array['db:name']); 

		if(self::$db_connect->connect_errno)
			throw new Exception("Error: Connect DataBase".mysqli_connect_Error(), 9);

		if(empty($mysql_array['db:char'])) 
			$mysql_array['db:char'] = 'utf8';

		if(!self::$db_connect->set_charset($mysql_array['db:char']))
			throw new Exception("Error: Set Charter MySql", 18);
			

		return self::$db_connect;
	}

	//method return result query database
	//method given str query in shape select:from:...
	//if str query contains false value then this is parametr non  
	public static function getResult(string $q){

		//check given string on empty
		if(!empty($q))
			$qar = LA::getFilterExArray('::', $q);
		else
			throw new Exception("Error: Empty String Query Select", 11);

		//parse str query of mysql
		if(!is_array($qar) or (count($qar) != 7))
			throw new Exception("Error: Given Query String Select", 12);
		
		//if empty "WHERE, GROUP BY, LIMIT" in $q[]
		$qar[2] = ($qar[2] != 'false') ? 'WHERE '.$qar[2] : $qar[2] = null;
		$qar[3] = ($qar[3] != 'false') ? 'GROUP BY '.$qar[3] : $qar[3] = null;
		$qar[6] = ($qar[6] != 'false') ? 'LIMIT '.$qar[6] : $qar[6] = null;

		self::$_strq_select = "SELECT $qar[0]
						FROM $qar[1]
						$qar[2]
						$qar[3]
						ORDER BY $qar[4]
						$qar[5]
						$qar[6]";

		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_result = self::$db_connect->query(self::$_strq_select);

		if(empty(self::$db_result) or !isset(self::$db_result))
			throw new Exception('Error: Query DataBase Select', 10);
			
		return self::$db_result;
	}

	//method return result query database
	//method given str query
	public static function getMyResult(string $q){

		//check given string on empty
		if(empty($q))
			throw new Exception("Error: Empty String Query Select", 11);

		self::$_strq_select = "$q";

		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_result = self::$db_connect->query(self::$_strq_select);
			
		return self::$db_result;
	}

	//method return array one row of mysql query
	//method given arrType
	public static function getRow(string $arrType = MYSQLI_ASSOC){

		//check if object and empty database result
		if(is_object(self::$db_result) and !empty(self::$db_result))
				$arr = self::$db_result->fetch_array($arrType);

		else throw new Exception("Error: Get Row From DataBase", 13);

		return (!empty($arr) and isset($arr)) ? $arr : null;

	}

	//method return array all rows of mysql query
	//method given arrType
	public static function getRows(string $arrType = MYSQLI_ASSOC){

		//check if object and empty database result
		if(is_object(self::$db_result) and !empty(self::$db_result))

			//fill $arrAll all colums result
			while($arr = self::$db_result->fetch_array($arrType))
				$arrAll[] = $arr;

		else throw new Exception("Error: Get Rows From DataBase", 13);

			self::freeResult();

			return (!empty($arrAll)) ? $arrAll: null;
	}

	//method return result update query database
	//method given str query in shape table:set:...
	//if str query contains false value then this is parametr non  
	public static function upResult($q){

		//check given string on empty
		if(!empty($q))
			$qar = LA::getFilterExArray('::', $q);
		else
			throw new Exception("Error: String Query Update", 11);


		//parse str query of mysql
		if(!is_array($qar) or (count($qar) != 3))
			throw new Exception("Error: Given Query String Update", 12);

		//if empty "WHERE" in $q[]
		$qar[2] = ($qar[2] != 'false') ? 'WHERE '.$qar[2] : $qar[2] = null;

		self::$_strq_up = "UPDATE $qar[0]
						SET $qar[1]
						$qar[2]";


		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_update = self::$db_connect->query(self::$_strq_up);

		if(empty(self::$db_update) or !isset(self::$db_update))
			throw new Exception("Error: Query DataBase Update", 20);
			
		return self::$db_update;
	}

	//method return result add query database
	//method given str query in shape table:val1:val2:...
	//if str query contains false value then this is parametr non  
	public static function addResult(string $q){

		//check given string on empty
		if(!empty($q))
			$qar = LA::getFilterExArray('::', $q);
		else
			throw new Exception("Error: String Query Add", 11);

		//parse str query of mysql
		if(!is_array($qar) or (count($qar) != 3))
			throw new Exception("Error: Given Query String Add", 12);

		self::$_strq_add = "INSERT INTO $qar[0] ($qar[1]) VALUES ($qar[2])";

		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_add = self::$db_connect->query(self::$_strq_add);

		if(empty(self::$db_add) or !isset(self::$db_add))
			throw new Exception("Error: Query DataBase Add", 20);
			
		return self::$db_add;
	}

	//method return result delete query database
	//method given str query in shape table:val1:val2:...
	//if str query contains false value then this is parametr non  
	public static function delResult(string $q){

		//check given string on empty
		if(!empty($q))
			$qar = LA::getFilterExArray('::', $q);
		else
			throw new Exception("Error: String Query Delete", 11);

		//parse str query of mysql
		if(!is_array($qar) or (count($qar) != 2))
			throw new Exception("Error: Given Query String Delete", 12);

		self::$_strq_del = "DELETE FROM $qar[0] WHERE $qar[1]";

		//query result of given str ($q <> $_strq)
		if(is_object(self::$db_connect) and !empty(self::$db_connect))
			self::$db_del = self::$db_connect->query(self::$_strq_del);

		if(empty(self::$db_del) or !isset(self::$db_del))
			throw new Exception("Error: Query DataBase Delete", 21);
			
		return self::$db_del;
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
	//method given array ($handler_route => string) and ($path_conf path config file) 
	//method include file handler model
	public static function loadModel(string $handler_route, $path_conf = null){

		//connect to database mysql
		self::$db_connect = self::getConnect($path_conf);

		//get array filter of '@' from handler route
		$ex_mysql_array = LA::getFilterExArray('@', $handler_route);

		$file_inc_m = ROOT.'/models/'.ucfirst(str_replace('Controller',
														  'Model', 
														   $ex_mysql_array[0])).'.php';

		//include file handle model
		if(file_exists($file_inc_m))
			include_once $file_inc_m;
	}
}
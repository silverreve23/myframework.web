<?php

namespace system\core;

use system\core\{ExClassCore, Model};
use system\libs\{LA, LH};
use mysqli;
use Exception;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//class Migrate for dump mysql
final class Migrate extends ExClassCore{

	private static $_tmp_dump = ROOT.'/dump/mysql/',
				   $_db_connect = null;
	
	//method return dump file *.sql DB
 	public static function getDown(){

 		//connect to database mysql
		
		self::$_db_connect = Model::getConnect();
		$_db_query = Model::getMyResult("SHOW TABLES");
		$_db_rows = Model::getRows(MYSQLI_NUM);

		$file_dump = fopen(self::$_tmp_dump.time().'.sql', "w");

		foreach ($_db_rows as $_db_rows_item) {
			$_db_query = Model::getMyResult("SHOW CREATE TABLE $_db_rows_item[0]");
			$_db_drop = "DROP TABLE $_db_rows_item[0];";
			$_db_rows = Model::getRows(MYSQLI_NUM);

			if(file_exists(self::$_tmp_dump.time().'.sql'))
				fwrite($file_dump, $_db_drop."\n".$_db_rows[0][1].";\n");
		}

	}

	//set dump mysql DB from file *.sql
	//method given path config *.sql file
	//method return bool
	public static function setUp(string $file_name = null){

		if(empty($file_name))
			throw new Exception("Error Empty Name File Dump", 32);

		$dump = file_get_contents(ROOT."/dump/mysql/$file_name.sql");
		$dump = explode(';', $dump);

		self::$_db_connect = Model::getConnect();
		echo '<br><br>';

		foreach ($dump as $val_d){

			$val_d = trim($val_d);
			
			if(!empty($val_d))
				Model::getMyResult($val_d);
		}
	}
}
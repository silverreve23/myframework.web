<?php

//lib for work with the arrays 
class SArray{
	
	//method explode array in a given delimiter
	//method given delimiter and str (explode)
	public static function getFilterExArray($delimiter = '/', $str_ex = null){

		if(!is_string($str_ex))
			throw new Exception("Eror Given Str Non String", 2);
			
		$ex_url_array = explode($delimiter, $str_ex);
		$ex_url_array = array_diff($ex_url_array, array(''));

		return $ex_url_array;
	}

	//method check array on keys
	//method given two arrays
	//method return boolean val
	public static function getKeysExists($arrKeys = null, $arrSerch = null){

		//if empty given arrays
		if(empty($arrKeys) or empty($arrSerch))
			throw new Exception("Eror Given Array Empty", 14);
		
		//search key in array (return false if no exists key) 
		foreach ($arrKeys as $arrkey) {

			if(!array_key_exists($arrkey, $arrSerch))
				return false;
		}

		return true;
	}

	//method return array of file
	//method given path to file
	public static function getArrayFromFile($tmp = null){

		if(!empty($tmp))
			if(file_exists($tmp)){
				$tmp_arr = include $tmp;
				if(is_array($tmp_arr))
					return include $tmp;
				else throw new Exception('Error Given Array Non Is Array', 3);
			}
			else throw new Exception('Error File Of Given Path Non Exists', 1);
	}
}
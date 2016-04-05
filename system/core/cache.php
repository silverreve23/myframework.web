<?php

//class Cache processing cache view
final class Cache{

	private static $_tmp_cache = ROOT.'/config/cache.php';

	//method return cache in given name
	public static function getCache($name_f = null){

		$tmp_cache_file = ROOT.'/cache/'.$name_f.'.php';

		echo file_get_contents($tmp_cache_file);

	}

	//method set cache in given name
	public static function setCache($name_f = null, $ob_content = null){

		$tmp_cache_file = ROOT.'/cache/'.$name_f.'.php';

		//create cache view file
		$file_cache = fopen($tmp_cache_file, "w");
		fwrite($file_cache, $ob_content);
		fclose($file_cache);

	}

	//method checking isset cache in given name file
	public static function isCache($name_f = null){

		if(!empty($name_f)){

			$tmp_cache_file = ROOT.'/cache/'.$name_f.'.php';

			if(file_exists($tmp_cache_file)){

				$cache_array = SArray::getArrayFromFile(self::$_tmp_cache);
				$arr_cache_compare = ['cache:enable', 'cache:time', 'cache:list'];

				if(!SArray::getKeysExists($arr_cache_compare, $cache_array))
					throw new Exception("Error Config File Cache", 15);

				if(empty($cache_array['cache:time']))
					$cache_array['cache:time'] = 300;

				if((time() - ((int) $cache_array['cache:time'])) < filemtime($tmp_cache_file))
					return true;

			}
		}

		return false;
	}

	//method checking if enable cache 
	public static function enblCache($name_f = null){

		if(!empty($name_f)){

			$cache_array = SArray::getArrayFromFile(self::$_tmp_cache);
			if($cache_array['cache:enable'])
				if(!empty($cache_array['cache:list']) and in_array($name_f, $cache_array['cache:list']))
					return true;
		}

		return false;
	}

}
<?php

//class View for processing view
class View extends ExClassCore{

	private static $_root_section = ROOT.'/templates/sections/';
	private static $_arrResult = null;

	//method load section in files view
	//method include section in given name
	public static function loadSection($name_section = null){

		if(!empty($name_section))
			self::$_root_section = ROOT.'/templates/sections/'.$name_section.'.php';
		else
			throw new Exception("Error Request Template Section", 8);

		if(file_exists(self::$_root_section))
			include self::$_root_section;
		else
			throw new Exception("Error Include File Header: '$name_section'", 7);
	}

	//main method load template
	//method given handler view (name and result => array)
	//method include section in given name
	//method handler cache
	public static function loadTemplate($name_v, $results = null){

		//checin isset cache
		if(Cache::isCache(strtolower($name_v))){

			Cache::getCache(strtolower($name_v));

		}else{

			if(Cache::enblCache(strtolower($name_v)))
				ob_start();
			
			self::$_arrResult = $results;
			$file_inc_v = ROOT.'/templates/'.strtolower($name_v).'.php';

			if(file_exists($file_inc_v))
				include $file_inc_v;
			else
				throw new Exception("Error Include File View", 6);


			if(Cache::enblCache(strtolower($name_v)))
				Cache::setCache(strtolower($name_v), ob_get_contents());
		}
	}

	//method return values of given name
	public static function getVar($name_var = null){

		return ($name_var !== null) ? self::$_arrResult[$name_var] : null;
	}
}
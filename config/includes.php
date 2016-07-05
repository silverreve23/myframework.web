<?php

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//include file for work framework
//include_once ROOT.'/system/core/excore.php';
//fun autoload classes
function __autoload($cl){

	$cl = ROOT.'/'.str_replace("\\", '/', $cl).'.php';

	if(file_exists($cl))
		include $cl;
		
}




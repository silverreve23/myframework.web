<?php
use system\libs\LA;
use system\libs\LH;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//$exception => Exception variable
//array trace exception
$trace_e = $exception->getTrace()[0];
$file_e = LA::getFilterExArray('/', $trace_e['file']);
$file_e = array_pop($file_e);

if($exception->getCode() == 7)
	echo '<center>Сторінка не знайдена</center>';
else
	LH::styleError($exception->getMessage().' Function: '.$trace_e['function'].' File: '.$file_e);
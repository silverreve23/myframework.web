<?php

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//array configuration cache params
//cache:time set in seconds
//needs value [cache:enable, cache:time, cache:list]
return array(
	'cache:enable' => true,
	'cache:time' => 1,
	'cache:list' => ['index', 'view']
);
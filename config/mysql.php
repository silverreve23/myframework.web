<?php

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//array configuration mysql database
//needs value [db:host, db:name, db:user, db:pass]
return array(
	'db:host' => 'localhost',
	'db:name' => 'mytest',
	'db:user' => 'admin',
	'db:pass' => 'admin',
	'db:char' => 'utf8'
);
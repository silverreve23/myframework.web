<?php

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

$pos_search = stripos($_SERVER['REQUEST_URI'], 'search');

if($pos_search !== false)
	header("Location: http://$_SERVER[HTTP_HOST]");

echo '404';
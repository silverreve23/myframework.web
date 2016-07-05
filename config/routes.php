<?php

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//array configuration route (url) handler
//example method:url => [my]Controller@method
return array(
	'get:install' => 'InstallController@getInstall',
	'post:add_user' => 'InstallController@postUser',
	'get:/' => 'PageController@getIndex',
	'get:view' => 'PageController@getView',
	'post:search' => 'PageController@postSearch',
	'get:admin' => 'AdminController@getIndex',
	'post:check' => 'AdminController@postCheck',
	'get:logout' => 'AdminController@getLogOutAdmin',
	'post:update' => 'AdminController@postUpdateAdmin',
	'post:update_top' => 'AdminController@postUpdateTopAdmin',
	'post:update_bot' => 'AdminController@postUpdateBotAdmin',
	'post:add' => 'AdminController@postAddAdmin',
	'post:add_cat' => 'AdminController@postAddCatAdmin',
	'post:del_post' => 'AdminController@postDelPostAdmin',
	'post:del_cat' => 'AdminController@postDelCatAdmin',
);
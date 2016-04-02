<?php

//array configuration route (url) handler
//example method:url => [my]Controller@method
return array(
	'get:/' => 'PageController@getIndex',
	'get:view' => 'PageController@getIndex',
	'get:views' => 'ViewController@getViews',
	'post:form' => 'PageController@postIndex',
	'post:about' => 'PageController@getAbout'
);
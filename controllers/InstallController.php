<?php

use system\core\{Model, Migrate};
use system\libs\{LA, LH, LC};

//controller processing install site
class InstallController{
	
	public function getInstall(){

		Migrate::setUp('1465722274');

		return array('install');
	}

	public function postUser(){

		list($login, $pass) = LC::getValOfPostParams(['login', 'pass']);

		if(Model::addResult("users::login, password::'$login', '$pass'"))
			if(Model::addResult("cont::title,text::'bot', ''"))
				if(Model::addResult("cont::title,text::'top', ''"))
					if(Model::addResult("old_message::text::''"))
						header("Location: http://$_SERVER[HTTP_HOST]/admin/");
	}
}
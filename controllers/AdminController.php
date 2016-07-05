<?php
use system\libs\{LS, LC, LH};

//class admin handle controller
class AdminController{

	//index admin panel
	public function getIndex(){

		$arrResult['item_post'] = AdminModel::getAllPost();
		$arrResult['item_mess'] = AdminModel::getMess();
		$arrResult['item_menu'] = AdminModel::getMenuItem();

		$arrResult['item_top'] = AdminModel::getContent('top');

		$arrResult['item_bot'] = AdminModel::getContent('bot');

		$arrResult['login'] = LS::getVar('login');
		$arrResult['title_page'] = 'Admin Panel';
		$arrResult['section'] = LC::getValOfGetParams(1);

		if(empty($arrResult['section'][0]))
			$arrResult['section'][0] = 'main';

		return array('admin', $arrResult);
	}

	//del posts
	public function postDelPostAdmin(){

		//get post variable
		list($id_post) = LC::getValOfPostParams(['del_post']); 	
		
		if(AdminModel::delPost($id_post))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/del_post");
	}

	//del cats
	public function postDelCatAdmin(){

		//get post variable
		list($id_cat) = LC::getValOfPostParams(['del_cat']); 	

		if(AdminModel::delCat($id_cat))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/del_cat");
	}

	//update admin panel
	public function postUpdateAdmin(){

		//get post variable
		list($text_post, $id_post) = LC::getValOfPostParams(['text', 'id']); 
		//model update 
		if(AdminModel::updatePost($text_post, $id_post))
			header("Location: http://$_SERVER[HTTP_HOST]/admin");
	}

	//update top content admin panel
	public function postUpdateTopAdmin(){

		//get post variable
		list($text_top) = LC::getValOfPostParams(['text']); 
		//model update 
		if(AdminModel::updateCont($text_top, 'top'))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/up_top");
	}

	//update botto content admin panel
	public function postUpdateBotAdmin(){

		//get post variable
		list($text_bot) = LC::getValOfPostParams(['text']); 
		//model update 
		if(AdminModel::updateCont($text_bot, 'bot'))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/up_bot");
	}
	//add post admin panel
	public function postAddAdmin(){

		//get post variable
		list($title_post, $text_post, $cat) = LC::getValOfPostParams(['title', 'text', 'category']); 

		if(AdminModel::addPost($title_post, $text_post, $cat))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/add_post");

	}

	//add cat admin panel
	public function postAddCatAdmin(){

		//get post variable
		list($title_cat) = LC::getValOfPostParams(['title']); 

		if(AdminModel::addCat($title_cat))
			header("Location: http://$_SERVER[HTTP_HOST]/admin/add_cat");

	}

	//method checking log in data
	public function postCheck(){

		//get post variable
		list($login_post, $pass_post) = LC::getValOfPostParams(['login', 'pass']); 

		if(AdminModel::checkUser($login_post, $pass_post)){

			LS::setVar('login', $login_post);
			$arrResult['login'] = LS::getVar('login');
			header("Location: http://$_SERVER[HTTP_HOST]/admin");
		}
		else{
			echo LH::styleError('Error Login or Password');
		}
	}

	//method log out
	public function getLogOutAdmin(){

		LS::dest();

		$arrResult['login'] = LS::getVar('login');

		header("Location: http://$_SERVER[HTTP_HOST]/admin");

	}

}
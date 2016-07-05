<?php
use system\libs\{LS, LC};

//controller handle pages
class PageController{

	//block function
	private function getBlock(){
		$arrResult['menus_items'] = PageModel::getAllMenu()['i'];
		$arrResult['menus_sub'] = PageModel::getAllMenu()['s'];
		$arrResult['login'] = LS::getVar('login');
		$arrResult['top_content'] = PageModel::getContent('top');
		$arrResult['bot_content'] = PageModel::getContent('bot');
		
		return $arrResult;
	}

	//index admin panel
	public function getIndex(){

		$arrResult = self::getBlock();
		$arrResult['item_mess'] = PageModel::getPostMessage();
		$arrResult['item_mess']['text'] = htmlspecialchars_decode($arrResult['item_mess']['text'] );
		$arrResult['title_page'] = 'Головна';		

		return array('index', $arrResult);
	}

	//view controller handle
	public function getView(){

		list($id_text) = LC::getValOfGetParams(1);

		$arrResult = self::getBlock();
		$arrResult['item_mess'] = PageModel::getPostMenu($id_text);


		if(empty($arrResult['item_mess']))
			header("Location: http://$_SERVER[HTTP_HOST]");

		$arrResult['item_mess']['text'] = htmlspecialchars_decode($arrResult['item_mess']['text'] );
		$arrResult['title_page'] = 'Перегляд';

		return array('view', $arrResult);
	}

	//view controller handle
	public function postSearch(){

		list($text_search) = LC::getValOfPostParams(['search_text']);

		$arrResult = self::getBlock();
		$arrResult['item_search'] = PageModel::getAllSearch($text_search);

		$arrResult['title_page'] = 'Пошук';

		return array('search', $arrResult);
	}

	//method checking Log In data
	public function postCheck(){

		list($login_post, $pass_post) = LC::getValOfPostParams(['login', 'pass']); 


		LS::setVar('login', $login_post);

		$arrResult['login'] = LS::getVar('login');
		
		return array('admin', $arrResult);
	}

	//method log out
	public function getLogOutAdmin(){

		LS::dest();

		$arrResult['login'] = LS::getVar('login');
		
		echo $arrResult['login'];
	}

}
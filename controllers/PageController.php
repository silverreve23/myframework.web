<?php 

class PageController extends ExController{

	public function __construct(){
		echo 'I construct Page!';
	}

	public function getIndex(){

		list($id, $cat, $login) = LibController::getValOfGetParams(3); 

		if(!empty($id)){

			//handler one post
			Session::init();

			if(!empty($login))
				Session::setVar('login', $login);

			$pageResult['title_page'] = 'One Posts';
			$pageResult['items'] = PageModel::getOnePost($id);
			$pageResult['login'] = Session::getVar('login');

			if(empty($pageResult['items']))
				header("Location: /view");

			return array('view', $pageResult);

		}else{

			//handler all post
			Session::init();
			$pageResult['title_page'] = 'All Posts';
			$pageResult['items'] = PageModel::getAllPost();
			$pageResult['login'] = Session::getVar('login');
			
			return array('index', $pageResult);
		}
	}

	public function postIndex(){

		list($name, $val) = LibController::getValOfPostParams(['name', 'val']);

		$pageResult = array('id' => 20,
							'title' => 'index page',
							'text' => 'This is index page!',
							'name' => $name
		);

		return array('form', $pageResult);
	}

}
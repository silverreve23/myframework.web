<?php
use system\core\Model;

//class model admin handle DB
class AdminModel{

	//function geting all posts in admin panel 
	public static function getMess(){

		Model::getResult('id,text::old_message::false::false::id::ASC::false');
		$arrResult = Model::getRow();

		return $arrResult;
	} 

	//function geting one posts in admin panel 
	public static function getAllPost(){

		Model::getResult("*::sub_menus::id::false::id::ASC::false");

		$arrResult = Model::getRows();		

		return $arrResult;
	} 

	//check login and password user
	public static function getMenuItem(){

		Model::getResult("*::menus::id::false::id::ASC::false");

		$arrResult = Model::getRows();

		return $arrResult;
	}

	//del post model
	public static function delPost($id){

		if(Model::delResult("sub_menus::id=$id"))
			return true;

		return false;
	}

	//del cat model
	public static function delCat($id){

		if(Model::delResult("menus::id=$id"))
			return true;

		return false;
	}

	//check login and password user
	public static function checkUser($login, $pass){

		Model::getResult("*::users::login='$login'::false::id::ASC::false");

		$arrResult = Model::getRow();

		//checing login user in database
		if(!empty($arrResult['login']))
			if($arrResult['password'] == $pass)
				return true;

		return false;
	}

	//method update post admin panel
	public static function updatePost($text, $id){

		$text = htmlspecialchars($text, ENT_QUOTES);

		if(Model::upResult("old_message::text='$text'::id=$id"))
			return true;

		return false;
	}

	//method update post admin panel
	public static function updateCont($text, $title){

		$text = htmlspecialchars($text, ENT_QUOTES);

		if(Model::upResult("cont::text='$text'::title='$title'"))
			return true;

		return false;
	}

	//method update post admin panel
	public static function addPost($title, $text, $cat){

		$title = htmlspecialchars($title, ENT_QUOTES);
		$text = htmlspecialchars($text, ENT_QUOTES);

		if(Model::addResult("sub_menus::p_id,title,text::$cat,'$title','$text'"))
			return true;

		return false;
	}

	//method update post admin panel
	public static function addCat($title){

		$title = htmlspecialchars($title, ENT_QUOTES);

		if(Model::addResult("menus::title::'$title'"))
			return true;

		return false;
	}	

	//function geting one content
	public static function getContent($title){

		Model::getResult("text::cont::title='$title'::false::id::ASC::false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 
}
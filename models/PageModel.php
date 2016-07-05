<?php
use system\core\Model;
use system\libs\{LA, LH};

//model handle pages
class PageModel{

	//function geting all posts search in admin panel 
	public static function getAllSearch($search){

		$search = htmlspecialchars($search, ENT_QUOTES);

		Model::getResult("*::sub_menus::title LIKE '%$search%'::false::id::ASC::false");
		$arrResult = Model::getRows();

		return $arrResult;
	} 

	//get all menu items
	public static function getAllMenu(){

		Model::getResult('m.title AS m_title, s.id, s.title AS s_title :: menus m, sub_menus s :: m.id=s.p_id ::false::m.id::DESC::false');
		$arrResult['s'] = Model::getRows();

		$temp = array();

		if(LA::isEmptyArray($arrResult['s']))
			die();

			foreach ($arrResult['s'] as $arrItem) {

				if(!in_array($arrItem['m_title'], $temp)){
					$temp[] = $arrItem['m_title'];
				}
			}

		$arrResult['i'] = $temp;

		unset($temp);

		return $arrResult;
	} 

	//function geting one posts 
	public static function getOnePost($id){

		Model::getResult("*::posts::id=$id::false::id::ASC::false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 

	//function geting one content
	public static function getContent($title){

		Model::getResult("text::cont::title='$title'::false::id::ASC::false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 

	//function geting one post in message last
	public static function getPostMessage(){

		Model::getResult("*::old_message::false::false::id::ASC::false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 

	//function geting one post in menu text
	public static function getPostMenu($id){

		Model::getResult("text::sub_menus::id=$id::false::id::ASC::false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 
}
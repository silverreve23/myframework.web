<?php

class PageModel{

	public static function getAllPost(){

		Model::getResult('*:posts:false:false:id:ASC:false');
		$arrResult = Model::getAllRows();

		return $arrResult;
	} 

	public static function getOnePost($id){

		Model::getResult("*:posts:id=$id:false:id:ASC:false");

		$arrResult = Model::getRow();		

		return $arrResult;
	} 
	
}
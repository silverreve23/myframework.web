<?php

//define ROOT => root path
define('ROOT', dirname(__FILE__));

//includes main files
include_once ROOT.'/config/start.php';

try{

	//get handler route
	//method return handle route ([my]Controller@method)
	//method return handle url params
	//method given no needs path config routes file
	list($handlerRoute, $handlerParams) = Router::getHandlerRoute(null);

	//load file model
	//method given handle route ([my]Controller@method)
	//method given no needs path config mysql file
	Model::loadModel($handlerRoute, null);

	//get handler controller (load file controller)
	//method return {view} file and no needs parrams
	//method given handle route ([my]Controller@method)
	//method given handle url params
	$arrCtrl = Controller::getHandlerController($handlerRoute, $handlerParams);

	//if empty handle name view 
	if(empty($arrCtrl[0]))
		$arrCtrl[0] = false;

	//if empty handle url params
	if(empty($arrCtrl[1]))
		$arrCtrl[1] = null;
		
	list($tmpView, $arrResult) = $arrCtrl;

	//load file template (view)
	//method given name file view
	//method given no needs array result
	if($arrCtrl[0] !== false)
		View::loadTemplate($tmpView, $arrResult);

}catch(Exception $e){

	//echo error exceptions whise style
	SHtml::styleEror($e->getMessage());
}




<? use \system\core\View as View; ?>

<? View::loadSection('admin/header'); ?>

<?php 
	if(empty(View::getVar('login')))
		View::loadSection('admin/login');
	else 
		View::loadSection('admin/'.View::getVar('section')[0]);
?>

<? View::loadSection('admin/footer'); ?>

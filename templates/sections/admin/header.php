<? use \system\core\View as View; ?>

<!DOCTYPE HTML>
<!--
	Prism by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title><?=View::getVar('title_page');?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/templates/assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Banner -->
			<section id="banner">
				<div class="inner split">
					<section>
						<h2>Адміністративна Панель</h2>
						<?php 
							if(!empty(View::getVar('login')))
								echo View::getVar('login')."&nbsp;&nbsp;<a href='/logout'>Вийти</a>";
						?>
					</section>
					<section>
						<ul class="actions">
							<li><a href="/" class="button special">Головна</a></li>
						</ul>
					</section>
				</div>
			</section>

			<table class="table_menu_admin">
				<tr>
					<td><a href='/admin/up_top'>Оновити верх</a></td>
					<td><a href='/admin/up_bot'>Оновити низ</a></td>
					<td><a href='/admin/'>оновити повідомлення</a></td>
					<td><a href='/admin/add_post'>додати замітку</a></td>
					<td><a href='/admin/add_cat'>додати категорію</a></td>
					<td><a href='/admin/del_post'>видалити замітку</a></td>
					<td><a href='/admin/del_cat'>видалити категорію</a></td>
				</tr>
			</table>

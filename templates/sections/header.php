<? use \system\core\View; ?>

<!DOCTYPE HTML>
<!--
	Prism by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title><?=View::getVar('title_page');?></title>
		<meta charset="windows-1251" />
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
					<?php
						echo htmlspecialchars_decode(View::getVar('top_content')['text']);
					?>
					</section>
					<section>
						<ul class="actions">
							<li><a href="/" class="button special">Головна</a></li>
							<li><a href="mailto:#?subject=message from #"
							       class="button special">Написати</a></li>
						</ul>
						<h2>Пошук на сайті</h2>
						<form action="/search" method="POST">
							<input type="text" name="search_text" placeholder="Введіть текст..." style="background-color: #F5F5F5; border-radius: 35px; color: black;"></input>
							<br />
							<button style="color: black; border: 1px solid gray;" type="submit">шукати</button>
						</form>
					</section>
				</div>
			</section>
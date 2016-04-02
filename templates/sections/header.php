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
						<h2>Welcome to Prism, a free responsive site template by <a href="http://templated.co">TEMPLATED</a></h2>
					</section>
					<section>
						<p>Lorem ipsum nisl sed cursus magna et amet veroeros. Phasellus aliquam et tempus lorem dolor feugiat adipiscing lorem.</p>
						<ul class="actions">
							<li><a href="/" class="button special">Головна</a></li>
						</ul>
					</section>
				</div>
			</section>

				<!-- div logIn -->
				<div style='position: fixed;
						    top: 0; left: 0;
						    color: black;
						    border-radius: 0 0 5px 0;
						    background-color: #688AB0;
						    padding: 2px 10px;'>user: <?=@View::getVar('login');?></div>
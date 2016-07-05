<? use \system\core\View; ?>
		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					<?php
						echo htmlspecialchars_decode(View::getVar('bot_content')['text']);
					?>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="/templates/assets/js/jquery.min.js"></script>
			<script src="/templates/assets/js/skel.min.js"></script>
			<script src="/templates/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="/templates/assets/js/main.js"></script>

	</body>
</html>
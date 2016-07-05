<? use \system\core\View as View; ?>

			<section id="two" class="wrapper style2 alt">
				<div class="inner" id="admin_div_main">

					<br>
					<div id="div_m_a_1">
					<h2>Оновити Останнє повідомлення</h2>
					<form action="/update" method="post">
	
						<label>Введіть контент
							<textarea id="admin_text_main" name="text" style="height: 300px;"><?=@View::getVar('item_mess')['text'];?></textarea>
						</label>
							<input type="hidden" name="id" value="<?=@View::getVar('item_mess')['id'];?>"></input>
							<button style="width: 20%; margin-left: 40%; margin-top: 10px;" type="submit">Оновити</button>

					</form>
					</div>
					</div>
					</section>

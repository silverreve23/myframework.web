<? use \system\core\View as View; ?>

			<section id="two" class="wrapper style2 alt">
				<div class="inner">

					<br>
					<div id="div_m_a_6">
					<h2>Оновити Нижній Блок</h2>
					<form action="/update_bot" method="post">

						<label>Введіть контент
							<textarea name="text" style="height: 300px;"><?=View::getVar('item_bot')['text'];?></textarea>
						</label>
							<button style="width: 20%; margin-left: 40%; margin-top: 10px;" type="submit">Оновити</button>
					</form>
					</div>
					</div>
					</section>
<? use \system\core\View as View; ?>

		<!-- Two -->
			<section id="two" class="wrapper style2 alt">
				<div class="inner">

					<br>
					<div id="div_m_a_1">
					<h2>Оновити Останнє повідомлення</h2>
					<form action="/update" method="post">
						<? foreach (View::getVar('items') as $arrItem): ?>
						<label>Введіть контент
							<textarea name="text" style="height: 300px;"><?=$arrItem['text'];?></textarea>
						</label>
							<input type="hidden" name="id" value="<?=$arrItem['id'];?>"></input>
							<button style="width: 20%; margin-left: 40%; margin-top: 10px;" type="submit">Оновити</button>
						<? endforeach ?>
					</form>
					</div>

					<div id="div_m_a_2">
					<h2>Додати Замітку</h2>
					
					<form action="/add" method="post">
						<? foreach (View::getVar('items') as $arrItem): ?>
						<label>Виберіть Рубрику
							<select name="category">
							<?foreach (View::getVar('item_menu') as $key_item): ?>
								<option value="<?=$key_item['id']?>" ><?=$key_item['title']?></option>
							<?endforeach?>
							</select>
						</label>
						<label>Введіть назву	
							<input type="text" name="title" style=""></input>
						</label>
						<label>Введіть контент	
							<textarea name="text" style="height: 300px;"></textarea>
						</label>
							<button style="width: 20%; margin-left: 40%;" type="submit">додати</button>
						<? endforeach ?>
					</form>

					</div>

					<div id="div_m_a_3">
					<h2>Додати Рубрику</h2>
					
					<form action="/add_cat" method="post">
						<label>Введіть назву	
							<input type="text" name="title" style=""></input>
						</label>
							<button style="width: 20%; margin-left: 40%;" type="submit">додати</button>

					</form>

					</div>

				</div>
			</section>


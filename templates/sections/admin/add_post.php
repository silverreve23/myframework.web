<? use \system\core\View as View; ?>

			<section id="two" class="wrapper style2 alt">
				<div class="inner">
					<div id="div_m_a_2">
					<h2>Додати Замітку</h2>
					
					<form action="/add" method="post">

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

					</form>

					</div>
					</div>
					</section>
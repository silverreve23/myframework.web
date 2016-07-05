<? use \system\core\View as View; ?>

			<section id="two" class="wrapper style2 alt">
				<div class="inner">
					<div id="div_m_a_3">
					<h2>Видалити Категорію</h2>
					<form action="/del_cat" method="post">
						<label>Виберіть категорію
							<select name="del_cat">
							<?foreach (View::getVar('item_menu') as $key_item): ?>
								<option value="<?=$key_item['id']?>" ><?=$key_item['title']?></option>
							<?endforeach?>
							</select>
						</label>
							<button style="width: 20%; margin-left: 40%;" type="submit">видалити</button>

					</form>

					</div>

				</div>
			</section>
<? use \system\core\View as View; ?>
		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner split">

					<div class="block-left">
						<ul class="checklist">

						<?php foreach(View::getVar('menus_items') as $arrItem): ?>


	
							<li><span><?=$arrItem?></span>

							<?php foreach (View::getVar('menus_sub') as $arrSub) : ?>
								<?php if ($arrSub['m_title'] == $arrItem) : ?>

							    <?="<p><a style='text-decoration: none;' href='/view/$arrSub[id]'>$arrSub[s_title]</a></p>";?>

								<?php endif; ?>
							<?php endforeach; ?>

							</li>

						<?php endforeach ?>
						
						</ul>

					</div>

					<div class="block-right">
					<?=View::getVar('item_mess')['text'];?>
					</div>

				</div>
			</section>
<? use \system\core\View; ?>
<? use \system\libs\LH; ?>

		<!-- No Search -->
			<section id="two" class="wrapper style2 alt">
				<div class="inner">

				<?php if(!empty(View::getVar('item_search'))):?>

				<? foreach (View::getVar('item_search') as $arrItem): ?>

					<div class="spotlight">
						<div class="content">

							<h3><?=$arrItem['title'];?></h3>

							<p><?=LH::excerpt($arrItem['text']);?></p>

							<ul class="actions">
								<li><a href="/view/<?=$arrItem['id'];?>" class="button alt">Детально</a></li>
							</ul>
						</div>
					</div>
					
				<? endforeach ?> 
				<?php else :?>

					<div><center>Нічого не знайдено :(</center></div>
				<?php endif ?>
				</div>
			</section>


		<?php include ("header.php"); ?>

		<section id="main"> 
			<div class="container">
				<article id="main-col"> 
					<h1 class="page-title"><h1><?= $page->title ?></h1>
						<ul id="services">
							<?php foreach($page->apraksti as $apraksts1) { ?>
							<li>
								
								<?= $apraksts1->apraksts; ?> 

							</li>

						<?php } ?>	


						</ul>

				</article>
				<?php echo $page . "<br>"?>
				<?php echo $page->id . "<br>"?>
				<!-- Formas būvēšana pasūtīšanai -->

				<aside id="sidebar"> 
					<div class="dark"> <!-- globālais stils dark-->
					  <h3>Pierakstīties sistēmā</h3>
					  <form class="quote" id="forma" action="http://naivist.net/form/" method="post" onsubmit="return checkforblank()">

						<div>
							<label>Ēpasta adrese</label><br>
							<input type="text" placeholder="Ēpasts" id="email">
						</div>
						<div>
							<label>Parole</label><br>
							<input type="text" placeholder="Parole" id="vards">
						</div>

						<button class="button_1" type="Submit" onclick=" checkRange()" >Iesniegt</button> 
					</form>
					</div>
						<button><a href="<?=$pages->get('/registresanas/')->url ?>">Reģistrēšanās</a></button>

				</aside>

			</div>
		</section>

	<?php include ("footer.php"); ?>
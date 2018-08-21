
<?php include ("header.php"); ?>
		<section id="main"> 
			<div class="container">
				<article id="main-col"> 
					<h1 class="page-title"><?= $page->title ?></h1>
					<?php foreach($page->apraksti as $apraksts1) { ?>
						<p class="dark" id="teksts">
							
	  						<?= $apraksts1->apraksts; ?> 

						</p>

					<?php } ?>
					

				</article>
			</div>
		</section>
	<?php include ("footer.php"); ?>
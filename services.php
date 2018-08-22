<?php

	if($input->post->nosutit){ //Noskaidro vai reģ forma tiek iesniegta
		$email = $sanitizer->email($input->post->Email);
		$pass = $sanitizer->text($input->post->Passw);


        if($email) {

            $replace =array("@", ".", "_");
            $m = str_replace($replace, "-", $email); // mainīgaja $email visus aizliegtos simbolus aizvietojam ar -
            $username = $sanitizer->selectorValue($m); //Pārbauda vai tomēr vēl nav palikuši kādi aizliegtie simboli

            $find = $pages->get("name=$username"); //sameklējam starp visām lapām kur vārds ir username

            if($session->login($find, $pass)) { //Pārbaudām vai lietotājvārds atbilst parolei
            
            $link = $pages->get('/lietotaji/')->url; //Atrodam lapas adresi, lai varētu jaunno lietotāju nosūtīt uz to
            $session->redirect($link);

            	// echo 'ja, tika';

            }// } else {
            // 	echo 'netika';
            // }
        }
	
	}

?>
















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
				<aside id="sidebar"> 
					<div class="dark"> <!-- globālais stils dark-->
					  <h3>Pierakstīties sistēmā</h3>
					  <form class="quote" id="forma" action="" method="post">

						<div>
							<label>Ēpasta adrese</label><br>
							<input type="text" id="email" placeholder="Epasts" name="Email" maxlength="254" required>
						</div>
						<div>
							<label>Parole</label><br>
							<input type="password" placeholder="Parole" id="parole"  name="Passw" minlength="6" required>
						</div>

						<input type="submit" value="autentificēties" name="nosutit">
					</form>
					</div>
						<button><a href="<?=$pages->get('/registresanas/')->url ?>">Reģistrēšanās</a></button>

				</aside>

			</div>
		</section>

	<?php include ("footer.php"); ?>
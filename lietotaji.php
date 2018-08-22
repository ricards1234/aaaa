<?php  if($user->isGuest()) { // Noskaidro vai lietotājs ir viesis vai nav

		$link = $pages->get('/pierakstities/')->url; //Atrodam lapas adresi, lai varētu jaunno lietotāju nosūtīt uz to
        $session->redirect($link);
    }
    else {

    	//Tiek atrasts lietotājs
    	$userMail = $user->email; 
    	$profile = $pages->get("title=$userMail");
    	echo $profile->vards.'<br>';
    	echo $profile->uzvards.'<br>';
    	echo $profile->talrunis.'<br>';
    }

?>

<?php include ("header.php"); ?>
 <div>
            <form action="" method="post">
                <input type="text" placeholder="Vārds" name="regName" minlength="3" maxlength="254" autofocus="true" required>
                <input type="text" placeholder="Uzvārds" name="regSurname" minlength="3" maxlength="254" required>
                <input type="email" placeholder="Epasts" name="regEmail" maxlength="254" required>
                <input type="tel" placeholder="Tālrunis" name="regPhone" minlength="8" maxlength="8" required>
                <input type="password" placeholder="Jūsu parole" name="regPassw" minlength="6" required>
                <input type="password" placeholder="Atkārtoti parole" name="regAgainPassw" minlength="6" required>
                <input type="submit" value="reģistrēties" name="submit">
            </form>

            <?php  

            if($error){

                echo " Profils ar šādu e-mail jau eksistē";
            }
            ?>

            <div >
                <p></p>
            </div>
        </div>
 <?php include ("footer.php"); ?>
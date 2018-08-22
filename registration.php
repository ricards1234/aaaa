<?php
    
    $error=0;

    if($input->post->submit){ //Noskaidro vai reģ forma tiek iesniegta
        $name = $sanitizer->text($input->post->regName);
        $surname = $sanitizer->text($input->post->regSurname);
        $email = $sanitizer->email($input->post->regEmail); //email() iebūvētā processwire funkcija, kas pārbauda e-pasta formu
        $phone = $sanitizer->int($input->post->regPhone);
        $pass = $sanitizer->text($input->post->regPassw);
        $Apass = $sanitizer->text($input->post->regAgainPassw);

        if($email) {

            $replace =array("@", ".", "_");
            $m = str_replace($replace, "-", $email); // mainīgaja $email visus aizliegtos simbolus aizvietojam ar -
            $username = $sanitizer->selectorValue($m); //Pārbauda vai tomēr vēl nav palikuši kādi aizliegtie simboli
            $profile = $users->get($username); // Meklē profilu ar atbilstošo lietotājvārdu


            if($profile->id) {   // Pārbaudām vai profils eksistē un tam ir savs ID
                $error = 1;
            }
            else {
                $userNewRole = $roles->get('registrets-lietotajs'); // atradīs lomas id 
                //Tiek izveidots jauns lietotājs
                $newUser = new User(); //Mainīgais būs jauns lietotājs (Pievienosim lietotāju sadaļā)
                $newUser->of(false); // ieb
                $newUser->name = $username; //Jaunajam lietotājam pievienojam username (unikāls)
                 $newUser->email = $email; //Pievienojam epastu
                $newUser->pass = $pass; // 
                $newUser->roles->add($userNewRole); //Pišķiram registrets-lietotaja tiesibas
                // $newUser->user_activation = $activation;
                $users->save($newUser); //Saglabājam jauno lietotāju pie lietotājiem
                //Tiek aizpildīta lietotāja profila informācija
                $newprofile = new Page ();
                $newprofile->template = 'lietotajs';
                $newprofile->title = $email;
                $newprofile->of(false);
                $newprofile->vards = $name;
                $newprofile->parent = '/lietotaji/';
                $newprofile->uzvards = $username;
                $newprofile->email = $email;
                $newprofile->talrunis = $phone;
                $newprofile->save();

                $link = $pages->get('/paldies/')->url; //Atrodam lapas adresi, lai varētu jaunno lietotāju nosūtīt uz to
                $session->redirect($link);





            }

        }
        else die(); //Ja ēpasta nav if neizpildās un reģistrēšana netiek veikta

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
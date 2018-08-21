<?php include ("header.php"); ?>
 <div>
            <form action="#" method="post">
                <input type="text" placeholder="Vārds" name="regName" minlength="3" maxlength="254" autofocus="true" required>
                <input type="text" placeholder="Uzvārds" name="regSurname" minlength="3" maxlength="254" required>
                <input type="email" placeholder="Epasts" name="regEmail" maxlength="254" required>
                <input type="tel" placeholder="Tālrunis" name="regPhone" minlength="8" maxlength="8" required>
                <!-- <input type="text" placeholder="Dzimums" name="uname" required> -->
                <input type="password" placeholder="Jūsu parole" name="regPassw" minlength="6" required>
                <input type="password" placeholder="Atkārtoti parole" name="regAgainPassw" minlength="6" required>
                <div class="errorMessage" id="registrationError">
                    <p></p>
                </div>
                <input type="submit" value="reģistrēties" name="submit">
            </form>
            <div class="successMessage" id="registrationSuccess">
                <p></p>
            </div>
        </div>
    <?php include ("footer.php"); ?>
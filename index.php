<!-- *************** BITTE LESEN *************** -->

<!-- Ich werde dieses Formular dann für die Abgabe zum Online-Shop verwenden, deshalb habe ich schon ziemlich viel
CSS Code geschrieben. Die JavaScript Klassen habe ich auch deswegen schon vergeben, damit ich bei der großen Abgabe
dann weiter darauf aufbauen kann! 

Deswegen wurden die Navigationspunkte bei dieser Abgabe auch noch nicht richtig verlinkt! -->

<!-- Mittels php soll am Ende der Header eingebaut werden -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<main>

    <?php

        // Wenn der User/die Userin das Formular mittels Submit-Buttin abeschickt hat, soll "validate.php" aufgerufen werden
        if (isset($_POST['do-submit'])) {
            require_once 'validate.php';
        }

        /**
         * @param string $key
         */
        // Function oldValue anlegen, damit die eingegebenen Werte nicht immer gelöscht werden, wenn User/Userin dank einer Fehlermeldung nochmal das Formular angezeigt bekommen
        function oldValue (string $key)
        {
            if (isset($_POST[$key])) {
                echo $_POST[$key];
            }
        }

        /**
         * @param string $key
         * @param string $value
         */
        // Function oldValueRadio anlegen, damit auch der eingegebene Wert bei den Radio Buttons gespeichert werden kann
        function oldValueRadio (string $key, string $value)
        {
            if (isset($_POST[$key]) && $_POST[$key] === $value) {
                echo "checked";
            }
        }

    ?>
    
    <?php
        // Mittels if abfragen, ob sich Fehlermeldungen in errors befinden. Wenn Ja, dann sollen diese unter dem passenden Eingabefeld angezeigt werden
        if (!isset($errors) || !empty($errors)):
    ?>

    <div class="grid-wrapper-headline"> 
        <h2>Register here!</h2>
    </div>
    
    <div class="grid-wrapper">
        
        <div>
            <p>
                Wondering why we ask you to register? Most probably we have all been there. Just moments after you've placed your order, you get a nice email thanking you for your purchase. But then. Nothing.
                After a couple of days, you still haven't received the order or even a shipping notification. You want to contact the seller about your order, but how?
                And that's the turning point where we change the game. Once you've registered, you are going to have an overview of all placed orders whenever you want. 
            </p>

            <hr>

            <h3>
                Get all the benefits
            </h3>

            <p>
                Register to maintain an overview of your total orders. There is also the possibility to change your shipping address whenever you'd like to. If you have any open questions about your order, just check out your order number and give us a call.
            </p>
        </div>

        <form action="index.php" method="post" class="j-form">

            <!-- Radiobuttons: Geschlecht m w -->
            <div>
                <p>Please select your gender: *</p>
                <div class="radio_gender">
                    <input type="radio" name="salutation" id="w-gender" value="f" class="j-radio" <?php oldValueRadio('salutation', 'f'); ?>>
                    <label for="w-gender">female</label>

                    <input type="radio" name="salutation" id="m-gender" value="m" class="j-radio" <?php oldValueRadio('salutation', 'm'); ?>>
                    <label for="m-gender">male</label>
                    <div class="j-error_radio"></div>
                </div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['salutation'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['salutation'] . "</p>"; ?>
            </div>


            <!-- Eingabefeld: Username -->
            <div>
                <label for="username">Username: * </label> <br>
                <input id="username" type="text" value="<?php oldValue('username'); ?>" name="username" class="j-input_username" placeholder="JohnDoe25">
                <div class="j-error_username"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['username'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['username'] . "</p>"; ?>
                <!-- JS = gleich wie full name nehmen -->
            </div>


            <!-- Eingabefeld: Password -->
            <div>
                <label for="password">Password: * </label> <br>
                <input id="password" type="text" value="<?php oldValue('password'); ?>" name="password" class="j-input_password">
                <div class="j-error_password"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['password'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['password'] . "</p>"; ?>
                <!-- JS = gleich wie full name nehmen -->
            </div>


            <!-- Eingabefeld: Full Name -->
            <div>
                <label for="full_name">Full Name: * </label> <br>
                <input id="full_name" type="text" value="<?php oldValue('full_name'); ?>" name="full_name" class="j-input_full_name" placeholder="John Doe">
                <div class="j-error_full_name"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['full_name'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['full_name'] . "</p>"; ?>
            </div>


            <!-- Eingabefeld: Adresse -->
            <div>
                <label for="address">Address: * </label> <br>
                <input id="address" type="text" value="<?php oldValue('address'); ?>" name="address" class="j-input_address" placeholder="Frankes Road 2">
                <div class="j-error_address"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['address'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['address'] . "</p>"; ?>
            </div>


            <!-- Eingabefeld: E-Mail-Adresse -->
            <div>
                <label for="email">E-Mail Address: * </label> <br>
                <input id="email" type="email" value="<?php oldValue('email'); ?>" name="email" class="j-input_email" placeholder="John.doe@me.com">
                <div class="j-error_email"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['email'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['email'] . "</p>"; ?>
            </div>


            <!-- Eingabefeld: Geburtstag -->
            <div>
                <label for="birthday">Birthday: * </label> <br>
                <input id="birthday" type="text" value="<?php oldValue('birthday'); ?>" name="birthday" class="j-input_birthday" placeholder="DD.MM.YYYY">
                <div class="j-error_birthday"></div>
            </div>
            <!-- JS = gleich wie telephone number nehmen -->
            <div class="errors_php">
                <?php if (isset($errors['birthday'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['birthday'] . "</p>"; ?>
            </div>


            <!-- Auswahlliste: Land wählen-->
            <select class="chooseCountry" name="chooseCountry" id="chooseCountry">
                <?php

                    // dynamisch generiertes Dropdown
                    $options = require 'countries.php';
                    $options['_default'] = 'Please select your country ... *';

                    // _default in Variable deklarieren
                    $selected = '_default';

                    // Mittels isset abfragen, ob chooseCountry ausgewählt wurde
                    if (isset($_POST['chooseCountry'])) {

                        // chooseCountry in Variable deklarieren
                        $selected = $_POST['chooseCountry'];
                    }

                    foreach ($options as $value => $label) {

                        $selectedInput = ($selected === $value ? ' selected' : '');

                        // Mittels if abfragen, ob der eingegebene Wert der _default Wert ist
                        if ($value === '_default') {
                            echo "<option value=\"${value}\" hidden${selectedInput}>${label}</option>";
                        } else {
                            echo "<option value=\"${value}\"${selectedInput}>${label}</option>";
                        }
                    }
                    
                ?>
            </select>
            <div class="errors_php">
                <?php if (isset($errors['chooseCountry'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['chooseCountry'] . "</p>"; ?>
            </div>
          

            <!-- Checkboxen: Service Privacy Policy zustimmen -->
            <div class="policy">
                <div>
                    <label for="checkbox_service_privacy_policy">I agree to the Terms of Service and Privacy Policy. *</label>
                    <input type="checkbox" id="checkbox_service_privacy_policy" name="service_privacy_policy" value="true">
                </div>

                <div class="j-error_service_privacy_policy"></div>
            </div>
            <div class="errors_php">
                <?php if (isset($errors['service_privacy_policy'])) echo "<p style='font-family:whitman-display,serif;font-size:0.8rem;color:#EB5E5E;margin-bottom:1rem;'>" . $errors['service_privacy_policy'] . "</p>"; ?>
            </div>


            <!-- SUBMIT BUTTON -->
            <button class="button-submit" name="do-submit" type="submit">Submit!</button>

            <p class="form-mandatory">* Required</p>

        </form>

        <div></div>
    </div>

</main>

<?php else: ?>

    <!-- Wenn es keine Fehlermeldungen in erros gibt, dann soll dieses Code-Snippet ausgeführt werden. 
    Der User/die Userin bekomm so ein direktes Feedback, dass sein/ihr Formular erfolgreich abgeschickt wurde. -->
    <div class="successfully_sent_message">
        <h2>Thank you!</h2>

        <p>Your registration has been successful.</p>
    </div>

<?php endif; ?>

<!-- Mittels php soll am Ende der Footer eingebaut werden -->
<?php require_once __DIR__ . '/partials/footer.php'; ?>

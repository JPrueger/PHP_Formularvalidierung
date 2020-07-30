<?php

// ein Array "errors" wird erstellt, in die dann die Fehlermeldungen eingefügt werden sollen
$errors = [];

// Mittels isset abfragen, ob das Formular mittels Submit Button geschickt wurde
if (isset($_POST['do-submit'])) {

    // --------------------------- ANREDE VALIDIEREN -----------------------------

    // Mittels isset prüfen, ob einer der Radiobuttons "salutation" ausgewählt wurde
    if (!isset($_POST['salutation'])) {
        $errors['salutation'] = "Salutation cannot be left blank!";
    }


    // --------------------------- USERNAME VALIDIEREN ---------------------------

    // Mittels isset prüfen, ob das Eingabefeld "username" ausgefüllt wurde
    if (!isset($_POST['username']) || strlen($_POST['username']) < 2) {
        $errors['username'] = "Please enter your username!";
    }


    // --------------------------- PASSWORT VALIDIEREN ---------------------------

    // Mittels isset prüfen, ob das Eingabefeld "password" ausgefüllt wurde
    if (!isset($_POST['password']) || strlen($_POST['password']) < 2) {
        $errors['password'] = "Please choose a password!";
    }


    // --------------------------- NAME VALIDIEREN ---------------------------

    // Mittels isset prüfen, ob das Eingabefeld "full_name" ausgefüllt wurde
    if (!isset($_POST['full_name']) || strlen($_POST['full_name']) < 2) {
        $errors['full_name'] = "Please enter your full name!";
    }


    // --------------------------- ADDRESSE VALIDIEREN ---------------------------
    
    // Die Adresse wurde absichtlich nicht "gründlicher" überprüft, weil schwierig ist, internationale Adressen zu validiern
    if (!isset($_POST['address']) || strlen($_POST['address']) < 2) {
        $errors['address'] = "Please enter your address!";
    }


    // --------------------------- EMAIL VALIDIEREN ------------------------------
    
    // Mittels isset prüfen, ob das Eingabefeld "email" ausgefüllt wurde
    if (isset($_POST['email'])) {
            
        // Email in Variable deklarieren
        $email = $_POST['email'];
        $at = strpos($email, '@');

        if ($at < 1 || strpos($email, '.', $at) < ($at + 1)) {
            $errors['email'] = "Please enter your email adress!";
        }
    }


    // --------------------------- GEBURTSTAG VALIDIEREN ---------------------------

    // Mittels isset prüfen, ob das Eingabefeld "birthday" ausgefüllt wurde
    if (isset($_POST['birthday'])) {

        // Format soll wie im Platzhalter so dargestellt werden: DD.MM.YYYY

        // Birthday in Variable deklarieren
        $birthday = $_POST['birthday'];

        // Eingegebener Wert mittels explode an den "." trennen
        $dateParticles = explode('.', $birthday);

        // Mittels if abfragen, ob die unterteilte Eingabe nur aus 3 Teilen bestehen
        if (count($dateParticles) === 3) {

            // Der erste Teil soll den Tag darstellen, der zweite Teil das Monat und der dritte Teil das Jahr
            $day = (int)$dateParticles[0];
            $month = (int)$dateParticles[1];
            $year = (int)$dateParticles[2];

            // Speichern, wieviel Tage jedes Monat hat
            $months = [
                1 => 31,
                2 => 29,
                3 => 31,
                4 => 30,
                5 => 31,
                6 => 30,
                7 => 31,
                8 => 31,
                9 => 30,
                10 => 31,
                11 => 30,
                12 => 31
            ];

            // Mittels if abfragen, ob die Eingabe beim Teil des Monats nicht unter 1, und nicht über 12 liegt
            if ($month > 12 || $month < 1) {
                $errors['birthday'] = "Your month of birth does not appear valid.";

            // wenn Eingabe zwischen 1 und 12 ist, soll jetzt validiert werden ob die Anzahl der Tage dann auch zum Monat passt
            } else {
                $daysOfGivenMonth = $months[$month];

                // wenn Eingabe zwischen 1 und 12 ist, soll jetzt validiert werden ob die Anzahl der Tage dann auch zum Monat passt
                if ($day > $daysOfGivenMonth || $day < 1) {
                    $errors['birthday'] = "Your day of birth does not appear valid.";
                } else {
                    $currentYear = (int)date('Y');
                    // Mittels if abfragen, ob die Eingabe vom Geburtsjahr nicht älter als 120 Jahre ist
                    if ($year > $currentYear || $year < ($currentYear - 120)) {
                        $errors['birthday'] = "Your year of birth does not appear valid.";
                    }
                }
            }
        } else {
            // sonst soll ein Fehler ausgegeben werden
            $errors['birthday'] = "Please enter your birthday!";
        }
    }


    // --------------------------- LAND VALIDIEREN ---------------------------

    // Mittels isset prüfen, ob eine Auswahl von "chooseCountry" gewählt wurde
    if (isset($_POST['chooseCountry'])/* && $_POST['country'] !== '_default'*/) {

        // chooseCountries in Variable deklarieren
        $country = $_POST['chooseCountry'];
        $allowedOptions = require 'countries.php';

        if (!array_key_exists($country, $allowedOptions)) {
            $errors['chooseCountry'] = "Please select your country!";
        }
    }


    // --------------------------- SERVICE PRICAVY POLICY VALIDIEREN ---------------------------
    
    // Mittels isset prüfen, ob das Eingabefeld "service_privacy_policy" ausgefüllt wurde
    if (!isset($_POST['service_privacy_policy'])) {
        $errors['service_privacy_policy'] = "Terms of Service and Privacy Policy must be accepted!";
    }
   
}

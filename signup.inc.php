<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    if (isset($_POST["signup-submit"])) {
        $gebruikerView = new GebruikerView();

        $familienaam = $_POST["familienaam"];
        $voornaam = $_POST["voornaam"];
        $straatnaam = $_POST["straatnaam"];
        $huisnummer = $_POST["huisnummer"];
        $gemeente = $_POST["gemeente"];
        $postcode = $_POST["postcode"];
        $username = $_POST["gebruikersnaam"];
        $password = $_POST["paswoord"];
        $passwordRepeat = $_POST['paswoord-repeat'];

        if (empty($username) || empty($password) || empty($passwordRepeat) 
            || empty($familienaam) || empty($voornaam) || empty($straatnaam) 
            || empty($huisnummer) || empty($gemeente) || empty($postcode)) {
            redirect("./signup.php?username=" . $username . "&familienaam=" . $familienaam . "&voornaam=" . $voornaam
                . "&straatnaam=" . $straatnaam . "&huisnummer=" . $huisnummer . "&gemeente=" . $gemeente . "&postcode=" . $postcode, 
                "Gelieve alle velden in te vullen", "error");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            redirect("./signup.php?familienaam=" . $familienaam . "&voornaam=" . $voornaam
                . "&straatnaam=" . $straatnaam . "&huisnummer=" . $huisnummer . "&gemeente=" . $gemeente . "&postcode=" . $postcode, 
                "Geen geldige gebruikersnaam!", "error");
            exit(); 
        }
        else if ($password !== $passwordRepeat) {
            redirect("./signup.php?username=" . $username . "&familienaam=" . $familienaam . "&voornaam=" . $voornaam
            . "&straatnaam=" . $straatnaam . "&huisnummer=" . $huisnummer . "&gemeente=" . $gemeente . "&postcode=" . $postcode, 
            "Paswoorden komen niet overeen!", "error");
            exit();
        }
        else {
            $result = $gebruikerView->getGebruikerByGebruikersnaam($username);
            if ($result > 0) {
                redirect("./signup.php?username=" . $username . "&familienaam=" . $familienaam . "&voornaam=" . $voornaam
                . "&straatnaam=" . $straatnaam . "&huisnummer=" . $huisnummer . "&gemeente=" . $gemeente . "&postcode=" . $postcode, 
                "Gebruikersnaam is al in gebruik!", "error");
                exit();
            }
            else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $gebruikerView->voegToe($familienaam, $voornaam, $straatnaam, $huisnummer, $gemeente, $postcode, $username, $hashedPassword);
                redirect("./index.php", "Account succesvol aangemaakt!", "success");
            }
        }
    }
    else {
        redirect("./index.php");
        exit();
    }


?>
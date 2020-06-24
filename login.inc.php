<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    if (isset($_POST["login-submit"])) {
        $gebruikerView = new GebruikerView();
        
        $username = $_POST["gebruikersnaam"];
        $password = $_POST["wachtwoord"];

        if (empty($username) || empty($password)) {
            redirect("./login.php?username=" . $username, "Gelieve alle velden in te vullen", "error");
            exit();
        } 
        else {
            $gebruiker = $gebruikerView->getGebruikerByGebruikersnaam($username);
            $passwordCheck = password_verify($password, $gebruiker->paswoord);
            
            if (!$passwordCheck) {
                redirect("./login.php", "Foute gebruikersnaam of wachtwoord", "error");
            }
            else if ($passwordCheck) {
                $_SESSION["usedId"] = $gebruiker->id;
                $_SESSION["username"] = $gebruiker->gebruikersnaam;

                redirect("./mandje.php", "Succesvol ingelogt", "success");
                exit();
            }
            else {
                redirect("./index.php", "Foute gebruikersnaam of wachtwoord", "error");
                exit();
            }
        }
    }
    else {
        redirect("./login.php", "Er is iets fout gelopen", "error");
    }

?>
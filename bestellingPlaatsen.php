<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    /* Create template */
    $template = new Template("templates/bestelling.php");

    /* make a combined array of map from mandje + wijndatabase table */
    $wijnView = new wijnView();
    $gebruikerView = new GebruikerView();

    $mandje_wijnen = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : null;
    $wijnen = array();

    if ($mandje_wijnen != null) {
        foreach($mandje_wijnen as $mandje_wijn) {
            $wijn = $wijnView->getWijnById($mandje_wijn["wijnId"]);
            $wijn->aantal = $mandje_wijn["aantal"];
            array_push($wijnen, $wijn);
        }

        /* Voeg bestelling toe in database (lijn per lijn (wijn per wijn) in bestelbonlijnen) */
        $bestelbonView = new BestelbonView;

        if (isset($_SESSION["usedId"]) && isset($_SESSION["username"])) {
            $current_date = date('Y-m-d h:i:s');
            var_dump($current_date);
            $gebruiker = $gebruikerView->getGebruikerByGebruikersnaam($_SESSION["username"]);
            $bestelbonNummer = $bestelbonView->add($current_date, $gebruiker->voornaam, $gebruiker->familienaam, $gebruiker->straat, $gebruiker->huisnr, $gebruiker->gemeente, $gebruiker->postcode, $wijnen);

            /* Mandje leegmaken */
            if (isset($_SESSION["cart"])) {
                $_SESSION["cart"] = null;
            }

            $template->bestelbonId = $bestelbonNummer;
        } else {
            redirect("./login.php", "Gelieve eerst in te loggen", "error");
            exit();
        }
    }

    $template->title = "Bestelling";

    echo $template;

?>
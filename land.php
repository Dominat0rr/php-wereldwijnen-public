<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $soortView = new SoortView();
    $template = new Template("templates/landoverzicht.php");

    $template->landenHeader = null;

    $template->aantalLanden = $landView->getAantalLanden();
    $template->landenHeader = $landView->getLanden();

    $landId = (isset($_GET["id"])) ? (int)$_GET["id"] : null;

    $template->land = null;
    $template->aantalSoorten = null;

    if ($landId != null) {
        $land = $landView->getLandById($landId);
        if ($land != null) {
            $template->aantalSoorten = $soortView->getAantalSoortenByLandId($land->id);
        }
        $template->title = $land->naam;
        $template->singleLand = $land;
    } else {
        $template->title = "Geen land gevonden";
    }


    echo $template;

?>
<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $soortView = new SoortView();
    $template = new Template("templates/home.php");

    $template->aantalLanden = $landView->getAantalLanden();
    $template->landenHeader = $landView->getLanden();

    $landId = isset($_GET["land"]) ? $_GET["land"] : null;
    $template->soorten = null;
    $template->land = null;

    if ($landId != null) {
        $land = $landView->getLandById($landId);
        $template->title = "Soorten uit: " . $land->naam;
        $template->land = $land;
        $template->soorten = $soortView->getSoortenByLandId($landId);
    } else {
        $template->title = "Welkom op Wereldwijnen, selecteer een land om verder te gaan";
    }

    echo $template;

?>
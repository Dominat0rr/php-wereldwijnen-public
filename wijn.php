<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $wijnView = new WijnView();
    $template = new Template("templates/wijnoverzicht.php");

    $template->landenHeader = $landView->getLanden();

    $wijnId = (isset($_GET["id"])) ? (int)$_GET["id"] : null;

    $template->wijn = null;
    
    if ($wijnId != null) {
        $wijn = $wijnView->getWijnById($wijnId);
        $template->title = "Wijn van " . $wijn->jaar;
        $template->wijn = $wijn;
    } else {
        $template->title = "Geen wijn gevonden";
    }

    echo $template;

?>
<?php

    include_once "config/init.php";
    include "includes/autoloader.php"; 

?>

<?php

    $landView = new LandView();
    $wijnView = new WijnView();
    $template = new Template("templates/mandjeoverzicht.php");

    $template->title = "Mandje";
    $template->landenHeader = $landView->getLanden();

    $template->mandje_wijnen = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : null;
    $wijnen = array();

    if ($template->mandje_wijnen != null) {
        foreach($template->mandje_wijnen as $mandje_wijn) {
            $wijn = $wijnView->getWijnById($mandje_wijn["wijnId"]);
            $wijn->aantal = $mandje_wijn["aantal"];
            array_push($wijnen, $wijn);
        }
    }

    $template->wijnen = $wijnen;

    echo $template;

?>
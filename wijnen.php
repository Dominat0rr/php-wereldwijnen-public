<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $wijnView = new WijnView();
    $template = new Template("templates/wijnenoverzicht.php");

    $template->title = "Wijnen";

    $perPage = 20;
    $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $startAt = $perPage * ($page - 1);

    $aantalWijnen = $wijnView->getAantalWijnen();
    $totalPages = ceil($aantalWijnen / $perPage);
    $startPage = 1;
    $firstPage = 1;
    $latestPage = $totalPages;

    $template->links = "";

    if ($totalPages > 10) {
        if ($page > 6) {
            $startPage = $page - 5;
        }
        $totalPages = $startPage + 11;
    }

    if ($page != 1) {
        $template->links .= "<a class='btn btn-info links-first' href='wijnen.php?page=$firstPage'>$firstPage</a>";
    }

    for ($i = $startPage; $i <= $totalPages; $i++) {
        if ($i <= $latestPage && ($i != 1 || $page == 1) && ($i != $latestPage || $page == $latestPage)) {
            $template->links .= ($i != $page) ? "<a class='btn btn-primary links' href='wijnen.php?page=$i'>$i</a>": "<a class='btn btn-dark links-active'>$i</a>";
        }
    }

    $template->latestPage = $latestPage;

    if ($page < $latestPage) {
        $template->links .= "<a class='btn btn-info links-last' href='wijnen.php?page=$latestPage'>$latestPage</a>";
    }

    $template->landenHeader = $landView->getLanden();
    $template->wijnen = $wijnView->getWijnenWithPagination($startAt, $perPage);

    echo $template;

?>
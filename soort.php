<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $soortView = new SoortView();
    $wijnView = new WijnView();
    $template = new Template("templates/soortoverzicht.php");

    $template->landenHeader = $landView->getLanden();

    $soortId = (isset($_GET["id"])) ? (int)$_GET["id"] : null;

    $perPage = 15;
    $page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;
    $startAt = $perPage * ($page - 1);

    $template->soort = null;
    $template->aantalWijnen = null;
    $template->wijnen = null;

    $template->links = "";

    if ($soortId != null) {
        $soort = $soortView->getSoortById($soortId);
        if ($soort != null) {
            $aantalWijnen = $wijnView->getAantalWijnenBySoortId($soort->id);
            $totalPages = ceil($aantalWijnen / $perPage);
            $startPage = 1;
            $firstPage = 1;
            $latestPage = $totalPages;
            $template->wijnen = $wijnView->getWijnenWithPaginationBySoortId($soort->id, 1, 10);
            $template->aantalWijnen = $aantalWijnen;

            if ($totalPages > 10) {
                if ($page > 6) {
                    $startPage = $page - 5;
                }
                $totalPages = $startPage + 11;
            }
        
            if ($page > 11) {
                $template->links .= "<a class='btn btn-primary links-first' href='soort.php?id=" . $soort->id . "&page=$firstPage'>$firstPage</a> ";
            }
        
            for ($i = $startPage; $i < $totalPages; $i++) {
                if ($i <= $latestPage) {
                    $template->links .= ($i != $page) ? "<a class='btn btn-primary links' href='soort.php?id=" . $soort->id . "&page=$i'>$i</a> ": "$page";
                }
            }
        
            $template->latestPage = $latestPage;
        
            ($page < $latestPage) ? $template->links .= "<a class='btn btn-primary links-last' href='soort.php?id=" . $soort->id . "&page=$latestPage'>$latestPage</a>" : $template->links .= "$page";
        }
        $template->title = $soort->naam;
        $template->soort = $soort;
    } else {
        $template->title = "Geen soort gevonden";
    }

    echo $template;

?>
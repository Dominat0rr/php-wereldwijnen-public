<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $soortView = new SoortView();
    $landView = new LandView();
    $template = new Template("templates/soortenoverzicht.php");

    $template->title = "Soorten";

    $perPage = 15;
    $page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;
    $startAt = $perPage * ($page - 1);

    $aantalSoorten = $soortView->getAantalSoorten();
    $totalPages = ceil($aantalSoorten / $perPage);
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

    if ($page > 11) {
        $template->links .= "<a class='btn btn-primary links-first' href='soorten.php?page=$firstPage'>$firstPage</a> ";
    }

    for ($i = $startPage; $i < $totalPages; $i++) {
        if ($i <= $latestPage) {
            $template->links .= ($i != $page) ? "<a class='btn btn-primary links' href='wijnen.php?page=$i'>$i</a> ": " $page ";
        }
    }

    $template->latestPage = $latestPage;

    if ($page < $latestPage) {
        $template->links .= "<a class='btn btn-primary links-last' href='soorten.php?page=$latestPage'>$latestPage</a> ";
    }

    $template->landenHeader = $landView->getLanden();
    $template->soorten = $soortView->getSoortenWithPagination($startAt, $perPage);

    echo $template;

?>
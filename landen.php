<?php 

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php

    $landView = new LandView();
    $template = new Template("templates/landenoverzicht.php");

    $template->title = "Landen";

    $perPage = 10;
    $page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;
    $startAt = $perPage * ($page - 1);

    $aantalLanden = $landView->getAantalLanden();
    $totalPages = ceil($aantalLanden / $perPage);
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
        $template->links .= "<a class='btn btn-primary links-first' href='landen.php?page=$firstPage'>$firstPage</a> ";
    }

    for ($i = $startPage; $i < $totalPages; $i++) {
        if ($i <= $latestPage) {
            $template->links .= ($i != $page) ? "<a class='btn btn-primary links' href='landen.php?page=$i'>$i</a> ": " $page ";
        }
    }

    $template->latestPage = $latestPage;

    if ($page < $latestPage) {
        $template->links .= "<a class='btn btn-primary links-last' href='landen.php?page=$latestPage'>$latestPage</a> ";
    }

    $template->landenHeader = $landView->getLanden();
    $template->landen = $landView->getLandenWithPagination($startAt, $perPage);

    echo $template;

?>
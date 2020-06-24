<?php 

    include_once "config/init.php";
    include "includes/autoloader.php"; 
    
?>

<?php

    $wijnView = new WijnView();

    if (isset($_POST["submit"]) && isset($_POST["id"])) {
        $wijnId = $_POST["id"];

        if ($wijnId > 0 /* could also throw in a check to check if wine actually exists with a select request */) {
            for ($i = 0; $i < sizeof($_SESSION["cart"]); $i++) {
                if ($_SESSION["cart"][$i]["wijnId"] === $wijnId) {
                    //unset($_SESSION["cart"][$i]);
                    array_splice($_SESSION["cart"], $i, 1);
                } 
            }
            $wijn = $wijnView->getWijnById($wijnId);
            redirect("mandje.php", "Wijn uit " . $wijn->jaar . " is succesvol verwijderd uit uw mandje", "success");
        }
        else {
            redirect("mandje.php", "Er is iets fout gegaan", "error");
        }
    }

?>
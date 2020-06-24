<?php 

    include_once "config/init.php";
    include "includes/autoloader.php"; 
    
?>

<?php

    $wijnView = new WijnView();

    if (isset($_POST["submit"])) {
        $data = array();
        $data["wijnId"] = $_POST["wijnId"];
        $data["aantal"] = $_POST["aantal"];

        if ($data["aantal"] != null && $data["aantal"] > 0) {
            $_SESSION["cart"][] = $data;
            $wijn = $wijnView->getWijnById($data["wijnId"]);
            redirect("mandje.php", "Wijn uit " . $wijn->jaar . " is succesvol toegevoegd aan uw mandje", "success");
        }
        else {
            redirect("wijn.php?id=" . $data["wijnId"], "Gelieve een geldig aantal in te voeren", "error");
        }
    }

?>
<?php
    include_once "config/init.php";
    include "includes/autoloader.php";
?>

<?php

    //$gebruikersView = new GebruikersView;
    $template = new Template("templates/loginForm.php");
    
    $template->title = "Aanmelden";

    echo $template;

?>
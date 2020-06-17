<?php

    include_once "config/init.php";
    include "includes/autoloader.php";

?>

<?php
    session_start();
    session_unset();
    session_destroy();

    redirect("./index.php", "Succesvol afgemeld", "error");
    exit();
?>
<?php

    # Start session
    session_name("wereldwijnen");
    session_start(["cookie_lifetime" => 86400]);

    // # Remove all session variables
    // session_unset();

    // # Destroy the session
    // session_destroy();

    # Database config file
    require_once 'config.php';

    # Include helpers
    require_once 'helpers/system_helper.php';

?>
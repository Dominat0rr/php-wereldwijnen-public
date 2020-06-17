<?php
    # Redirect To Page
    function redirect($page = false, $message = null, $message_type = null) {
        if (is_string($page)) {
            $location = $page;
        } else {
            $location = $_SERVER ['SCRIPT_NAME'];
        }

        // Check for message
        if ($message != null) {
            $_SESSION['message'] = $message;
        }

        // Check for type
        if ($message_type != null) {
            $_SESSION['message_type'] = $message_type;
        }

        // Redirect
        header("Location: " . $location);
        exit;
    }

    # Display Message
    function displayErrorMessage() {
        if (!empty($_SESSION['message'])) {
            // Assign Message var
            $message = $_SESSION['message'];

            if (!empty($_SESSION['message_type'])) {
                // Assign Type var
                $message_type = $_SESSION['message_type'];
                // Create Output
                if ($message_type == 'error') {
                    echo '<div class="alert alert-danger">'.$message.'</div>';
                } else {
                    echo '<div class="alert alert-success">'.$message.'</div>';
                }
            }

            // Unset message
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }
?>
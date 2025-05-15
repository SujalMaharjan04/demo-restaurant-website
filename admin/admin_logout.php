<?php

    //Function to check if logged in or not
    if (!isset($_POST['username'])) {
        header("Location: ../users/index.php");
    }
    //Function for log out button
    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
        if (isset($_POST['logout']) && $_POST['logout'] == "logout") {
            session_destroy();
            header("Location: ../users/index.php");
        }
    }
?>
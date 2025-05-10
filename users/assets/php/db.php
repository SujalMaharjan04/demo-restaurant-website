<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "restaurant";

    $link = mysqli_connect($server, $username, $password, $database);

    if (!$link) {
        die("Database Connection Failed" . mysqli_connect_error());
    }

?>
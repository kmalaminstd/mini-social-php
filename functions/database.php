<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "minisocial";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_error){
        die("Failed to connect with database");
    }

    // echo "Success";

?>
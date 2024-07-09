<?php

    session_start();

    include "./database.php";

    $email = $_SESSION["email"];
    $post = [];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $post[] = $rows;
        }
    }
    echo json_encode($post);

    $conn->close();

?>
<?php

    session_start();
    include "./database.php";

    $user_email = $_SESSION["email"];

    $firstname = "";
    $lastname = "";
    $bio = "";
    

    if(isset($_POST["update_profile"]) && isset($_SERVER["REQUEST_METHOD"]) == "POST"){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $bio = $_POST["bio"];

        $stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, bio = ? WHERE email = ?");
        if($stmt){
            $stmt->bind_param("ssss", $firstname, $lastname, $bio, $user_email);
            if($stmt->execute()){
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;

                header("location: ../profile.php");
            }
        }
    }
?>
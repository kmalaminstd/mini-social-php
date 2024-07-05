<?php
    session_start();
    include "./database.php";
    if($_SESSION["email"]){
        header("Location: ../index.php");
        echo $_SESSION["email"];
    }
    echo $_SESSION["email"];

    $email = "";
    $password = "";

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT id, firstname, lastname, email, password, time FROM users WHERE email = ?");

        if($stmt){
           $stmt->bind_param("s", $email);

           if($stmt->execute()){
            $stmt->store_result();

            if($stmt->num_rows() > 0){
                $stmt->bind_result($id, $firstname, $lastname, $email, $hashed_password, $time);
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        // echo "Success";
                        header("Location: ../index.php");
                        $_SESSION["firstname"] = $firstName;
                        $_SESSION["lastname"] = $lastName;
                        $_SESSION["email"] = $email;
                    }else{
                        echo "failed";
                    }
                }
                
            }

           }
        }
    }

?>
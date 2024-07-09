<?php
    session_start();
    include "./database.php";
    if(isset($_SESSION["email"])){
        header("Location: ../index.php");
        // echo $_SESSION["email"];
        exit();
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
                $stmt->bind_result($id, $firstname, $lastname, $userEmail, $hashed_password, $time);
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        // echo "Success";
                        $_SESSION["USER_ID"] = $id;
                        $_SESSION["firstname"] = $firstname;
                        $_SESSION["lastname"] = $lastname;
                        $_SESSION["email"] = $userEmail;
                        session_set_cookie_params(30 * 24 * 60 * 60);
                        header("Location: ../index.php");
                        exit();
                    }else{
                        echo "failed";
                    }
                }
                
            }else{
                header("location: ../sign_up.php");
            }

           }
        }
    }

?>
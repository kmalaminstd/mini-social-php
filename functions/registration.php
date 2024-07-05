<?php
    session_start();
    include "./database.php";

    // if(!$_SESSION["email"]){
    //     header("Location: index.php");
    // }

    $firstName = "";
    $lastName = "";
    $email = "";
    $password = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])){

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        if($firstName && $lastName && $email && $password){
            echo $firstName;
            echo  $lastName;
            echo $email;
            echo $hashed_password;
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");

            if($stmt){
                $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashed_password);

                if($stmt->execute()){
                    // echo "Registration Successfull";
                    header("Location: ./index.php");
                    $_SESSION["firstname"] = $firstName;
                    $_SESSION["lastname"] = $lastName;
                    $_SESSION["email"] = $email;
                }else{
                    echo "Error". $stmt->error;
                }

                $stmt->close();
            }
            
        }

    }

    $conn->close();

?>
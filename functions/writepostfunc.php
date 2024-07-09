<?php
    session_start();
    include "./database.php";

    $content = "";
    $userEmail = $_SESSION["email"];
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $name = $firstname . ' '. $lastname;

    $userInfo = [];

    $sql = "SELECT * FROM users WHERE email = '$userEmail'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $userInfo[] = $rows;
        }
    }
    // $user_img = $userInfo['profile_image'];
    // var_dump($userInfo=>profile_image);
    $profile_image = $userInfo[0]["profile_image"];

    // echo $name;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_post"])){
        $content = $_POST["post_content"];
        if($content){
            $stmt = $conn->prepare("INSERT INTO posts (user_email, content, author_name, author_image) VALUES (?, ?, ?, ?)");

            if($stmt){
                $stmt->bind_param("ssss", $userEmail, $content , $name, $profile_image );

                if($stmt->execute()){
                    header("Location: ../index.php");
                }else{
                    echo "post failed";
                }
            }
        }         
    }   

?>
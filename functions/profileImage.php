<?php
    session_start();
    include "./database.php";

    $email = $_SESSION["email"];
    if(isset($_POST["update_pro_image"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $profile_image = $_FILES['pro_img']['name'];
        $profile_image_temp = $_FILES["pro_img"]["tmp_name"];
        $target_folder = "../uploads/".$profile_image;

        $sourced_folder = "./uploads/".$profile_image;
        
        if(move_uploaded_file($profile_image_temp, $target_folder)){
            
            $stmp = $conn->prepare("UPDATE users SET profile_image = ? WHERE email = ?");

            if($stmp){
                $stmp->bind_param("ss", $sourced_folder, $email);
                if($stmp->execute()){
                    header("Location: ../profile.php");
                }else{
                    echo "Update Failed";
                }
                
            }
        }else{
            echo "File upload failed";
        }


        

    }

?>
<?php

    include "./database.php";

    $post_id = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_post"])){
        
        $post_id = $_POST["post_value_id"];

        $stmt = $conn->prepare("DELETE FROM posts WHERE post_id = ?");

        if($stmt){
            $stmt->bind_param('s', $post_id);

            if($stmt->execute()){
                echo json_encode(["success"=>true]);
                header("location: ../writepost.php");
            }else{
                echo json_encode(["success"=>false]);
            }
        }else{
            echo json_encode(["success"=>false, "message" => "There is something wrong in your request"]);
        }

        $stmt->close();
        
    }

    $conn->close();

?>
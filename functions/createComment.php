<?php
    session_start();
    include "./database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $comment_content = $_POST["comment_content"];
        $user_id = $_SESSION["USER_ID"];
        $post_id = $_POST["post_id"];

        $stmt = $conn->prepare("INSERT INTO comments (comment_text, post_id, user_id) VALUES (?, ?, ?)");

        if($stmt){
            $stmt->bind_param("sss", $comment_content, $post_id, $user_id);

            if($stmt->execute()){
                echo json_encode(["success"=>true]);
            }else{
                echo json_encode(["success"=>false]);
            }
        }else{
            echo "failed bind";
        }

        $stmt->close();
        
    }

    $conn->close();

?>
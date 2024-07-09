<?php
    include "./database.php";

    if(isset($_POST["update_post_btn"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $content = $_POST["content"];
        $postid = $_POST['post_id'];

        $stmt = $conn->prepare("UPDATE posts SET content = ? WHERE post_id = ?");

        if($stmt){
            $stmt->bind_param("ss", $content, $postid);

            if($stmt->execute()){
                header("location: ../writepost.php");
            }else{
                echo "Post update failed";
            }
        }

        $stmt->close();
    }

?>
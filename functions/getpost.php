<?php

    include "./database.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $sql = "SELECT posts.user_email, posts.post_id, posts.content, posts.created_at AS post_created_at, posts.author_name, users.profile_image FROM users JOIN posts ON users.email = posts.user_email";

    $results = $conn->query($sql);

    $posts = [];

    if($results->num_rows > 0){
        while($rows = $results->fetch_assoc()){ 
            $posts[] = $rows;
        }
    }
    
    header("Content-Type: application/json");

    echo json_encode(["success"=>true, "data"=>$posts]);
    // var_dump($posts);

    $conn->close();
    

?>
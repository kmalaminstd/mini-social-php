<?php

    include "./database.php";

    $sql = "SELECT users.profile_image, posts.post_id AS post_id, posts.author_name, comments.comment_text, comments.comment_id, comments.post_id AS commenter_id, comments.created_at AS comment_create 
    FROM posts 
    INNER JOIN comments ON posts.post_id = comments.post_id
    INNER JOIN users ON users.id = comments.user_id";
    $result = $conn->query($sql);

    $comments = [];

    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $comments[] = $row;
        }
        echo json_encode(["success"=>true, "data"=>$comments]);
    }else{
        echo json_encode(["success"=>false, "data"=>[]]);
    }

    // echo json_encode($comments);

    $conn->close();

?>
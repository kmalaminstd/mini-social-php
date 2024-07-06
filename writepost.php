<?php

    include "./includes/header.php";
    include "./includes/nav.php";

?>

<div class="container">
        <h2>Write a Post</h2>
        <form action="write_post.php" method="POST" class="form">
            <div class="form-items">
                <label for="post_content">Post Content</label>
                <textarea id="post_content" name="post_content" placeholder="Write your post here..." required></textarea>
            </div>
            <input type="submit" value="Submit Post" name="submit_post">
        </form>
</div>

<?php

    include "./includes/footer.php";

?>
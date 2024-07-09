<?php
    
    include "./includes/header.php";
    include "./includes/nav.php";
?>

        <div class="container">
            <h2>Update Post</h2>
            <form id="updatePostForm" action="./functions/update_post.php" method="POST">
                <input type="hidden" name="post_id" id="post_id">
                
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="8" required></textarea>
                </div>

                <input type="text" name="post_id" class="post_id" hidden>
                
                <div class="form-group">
                    <input style="cursor: pointer;" type="submit" name="update_post_btn" value="Update Post">
                </div>
            </form>
        </div>

<?php

    include "./includes/footer.php";

?>

<script>

    const getPosturl = "./functions/getpost.php";

    const email = {
        user_email : <?php echo json_encode([$_SESSION['email']]); ?>
    }

    const url = location.href
    const urlObj = new URL(url)
    const params = new URLSearchParams(urlObj.search)
    
    const id = params.get('id')
    const exactEmail = email.user_email[0];

    // console.log(exactEmail);

    fetch(getPosturl)
        .then(res => res.json())
        .then(data => {
            // console.log(data);
            data.map(elm => {
                if(elm.user_email === exactEmail && elm.post_id === id){
                    console.log(elm);
                    document.querySelector("#content").value = elm.content;
                    document.querySelector(".post_id").value = elm.post_id;
                }
            })
        })
        .catch(err => {
            console.log(err);
        })

</script>
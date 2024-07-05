<?php
    session_start();
    include "./includes/header.php";
    include "./includes/nav.php";

    if(!$_SESSION["email"]){
        header("Location: login.php");
    }

    // echo $_SESSION["email"];
?>


    <main>

        <div class="posts">

        <?php
            include "./includes/post.php";
        ?>

            

        </div>

        <div class="some-users">
            
            <?php
                include "./includes/usersList.php";
            ?>
            
        </div>

    </main>

<?php
    include "./includes/footer.php"
?>

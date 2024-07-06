<?php
    include "./includes/header.php";
    include "./includes/nav.php";
?>


<div class="profile-container">

        <div class="profile-header">
            <img src="./assets/images/dummy-author.png" alt="Profile Picture" class="profile-picture">
            <h2 class="profile-name">User Name</h2>
            <button class="edit-profile-button" disabled>Update Image</button>
            <button class="edit-profile-button" disabled>Edit Profile</button>
            
        </div>

        <div class="profile-details">

            <div class="profile-info">
                <h3>About Me</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac vestibulum lacus. Curabitur venenatis ultrices elit, sit amet tempus magna vestibulum id.</p>
            </div>

            <div class="profile-stats">

                <div class="stat">
                    <span class="stat-number">120</span>
                    <span class="stat-label">Posts</span>
                </div>

                <div class="stat">
                    <span class="stat-number">300</span>
                    <span class="stat-label">Followers</span>
                </div>

                <div class="stat">
                    <span class="stat-number">180</span>
                    <span class="stat-label">Following</span>
                </div>

            </div>

        </div>
        <a class="lgt_btn" href="./logout.php">LOG OUT</a>
    </div>

<?php

    include "./includes/footer.php";

?>
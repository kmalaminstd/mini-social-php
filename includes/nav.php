<?php
    include "./functions/database.php";
?>

<nav class="navbar">
        <div class="upper-nav">
            <div class="brand">SocialMedia</div>

            <button class="toggle-button" onclick="toggleMenu()">☰</button>
        </div>
        <div class="menu" id="navbarMenu">
            <a href="index.php">Home</a>
            <a href="writepost.php">Write Post</a>
            <a href="profile.php">Profile</a>
            <a href="#report">Report Us</a>

            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-bar">
                <button class="search-button">🔍</button>
            </div>
        </div>
    </nav>

    <div style="margin-top: 80px;">

    </div>
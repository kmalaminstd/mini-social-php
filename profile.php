<?php
    include "./includes/header.php";
    include "./includes/nav.php";
?>


<div class="profile-container">

        <div class="profile-header">
            <!-- <img src="./assets/images/dummy-author.png" alt="Profile Picture" class="profile-picture"> -->
            <h2 class="profile-name">User Name</h2>
            <form method="POST" action="./functions/profileImage.php" enctype="multipart/form-data">
                <input type="file" id="pro_img" name="pro_img" hidden>
                <label for="pro_img" class="update-profile-button">Update Profile Image</label>
                <input type="submit" name="update_pro_image" class="edit-profile-button-two" value="Update">
            </form>
            <button class="edit-profile-button">Edit Profile</button>
            
        </div>

        <div class="profile-details">

            <div class="profile-info">
                <h3>About Me</h3>
                <p class="profile_bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac vestibulum lacus. Curabitur venenatis ultrices elit, sit amet tempus magna vestibulum id.</p>
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
        <button class="lgt_btn">LOG OUT</button>
    </div>

<?php

    include "./includes/footer.php";

?>

<script>
    const url = "./functions/getProfileInfo.php";
    fetch(url)
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if(data.length > 0){
                data.map(elm => {
                    console.log(elm.profile_image);
                    const html = `<img src="${elm.profile_image}" alt="Profile Picture" class="profile-picture">`
                    
                    document.querySelector('.profile-header').insertAdjacentHTML("afterbegin", html)
                    document.querySelector(".profile-name").textContent = `${elm.firstname} ${elm.lastname}`
                    document.querySelector('.profile_bio').textContent = elm.bio
                })
            }
        })
        .catch(err=>{
            console.log(err);
        })

    document.querySelector('.lgt_btn').addEventListener('click', ()=>{
        location.href = 'logout.php'
    })

    document.querySelector('.edit-profile-button').addEventListener('click', ()=>{
        location.href = 'update_profile.php'
    })

    

</script>
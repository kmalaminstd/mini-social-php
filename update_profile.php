<?php

    include "./includes/header.php";
    include "./includes/nav.php";

?>

    <div class="container">
            <h2>Update Profile</h2>
            <form action="./functions/update_profile.php" method="POST" enctype="multipart/form-data" id="updateProfileForm">

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" rows="4" required></textarea>
                </div>

                <input type="submit" class="btn" name="update_profile" value="UPDATE PROFILE">

            </form>
    </div>

<?php

    include "./includes/footer.php";

?>

<script>
    const url = "./functions/getProfileInfo.php";
    
    fetch(url)
        .then(res => res.json())
        .then(data => {
            // console.log(data);
            data.map(elm => {
                document.querySelector("#firstname").value = elm.firstname;
                document.querySelector("#lastname").value = elm.lastname;
                document.querySelector("#bio").value = elm.bio;
            })
        })
        .catch(err=>{
            console.log(err);
        })

    const updateUrl = "./functions/update_profile.php";
    document.querySelector("#updateProfileForm").addEventListener("submit", e=>{
        const formdata = new FormData(this);
        fetch(updateUrl, {
            method: "POST",
            body: formdata
        })
        .then(res => res.json())
        .then(data =>{
            if(data.success){
                console.log("Profile updated successfully");
            }else{
                console.log("Profile update failed");
            }
        })
        .catch(err=>{
            console.error(err);
        })
    })

</script>
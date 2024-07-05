<?php

  session_start();
  if(isset($_SESSION["email"])){
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/css/signup.css" />
  </head>
  <body>
    <div class="container">
      <form  action="./functions/registration.php" method="POST" enctype="multipart/form-data" class="form" id="form">
        <h2>Sign Up</h2>
        <div class="form-items">
          <label for="firstName">First Name</label>
          <input
            type="text"
            id="firstName"
            name="firstName"
            placeholder="First Name"
            required
          />
        </div>
        <div class="form-items">
          <label for="lastName">Last Name</label>
          <input
            type="text"
            id="lastName"
            name="lastName"
            placeholder="Last Name"
            required
          />
        </div>
        <div class="form-items">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="example@gmail.com"
            required
          />
        </div>
        <div class="form-items">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter password"
            required
            autocomplete="off"
          />
          <p id="show" class="show">show</p>
          <p id="hidden" class="hidden">Hidden</p>
        </div>
        <div class="form-items">
          <label for="confirm_password">Confirm Password</label>
          <input
            type="password"
            id="confirm_password"
            name="confirm_password"
            placeholder="Confirm password"
            required
            autocomplete="off"
          />
          <p id="show_con" class="show">show</p>
          <p id="hidden_con" class="hidden">Hidden</p>
        </div>
        <div class="message">
          <p id="messageBox"></p>
        </div>
        <input type="submit" value="Sign Up" name="signup" />
        <p class="account_status">
          Already have an account ? <span><a href="./login.php">Login</a></span>
        </p>
      </form>
    </div>
    <!-- <script src="./assets/js/authentication.js"></script>
    <script src="./assets/js/validation.js"></script> -->
    <script src="./assets/js/registration.js"></script>
  </body>
</html>

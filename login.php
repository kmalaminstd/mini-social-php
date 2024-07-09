<?php

  $cookies_lifetime = 30 * 24 * 60 * 60 ; // a month
  session_set_cookie_params($cookies_lifetime);

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
    <title>login</title>
    <link rel="stylesheet" href="./assets/css/login.css" />
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/db1fd23933.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <form action="./functions/login.php" method="POST" enctype="multipart/form-data" class="form">
        <h2>Login</h2>
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
          />
          <p id="show">show</p>
          <p id="hidden">Hidden</p>
        </div>
        <input type="submit" value="login" name="login" />
        <p class="account_status">
          Not Registered ? <span><a href="./sign_up.php">Registration</a></span>
        </p>
      </form>
    </div>

    <script src="./assets/js/authentication.js"></script>
  </body>
</html>

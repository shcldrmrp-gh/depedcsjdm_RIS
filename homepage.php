<?php
  include("login.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEPED CSJDM RIS GENERATOR</title> 
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="homepage_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  </head>
  <body>
    <div class="login_form">
      <div class="wrapper">
        <div class="title"><span>RIS Login Form</span></div>
        <form name="form" action="login.php" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="abc@deped.gov.ph" name="loginEmail" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="loginPass" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login" name="login">
          </div>
        </form>
      </div>
    </div>

    <footer>
      <script>
          history.pushState(null, null, location.href);
          window.onpopstate = function () {
              history.go(1);
          };
      </script>
    </footer>
  </body>
</html>
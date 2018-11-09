<?php

session_start();

$error = null;

if ( isset($_SESSION['stock_user']))
{
  header('Location: index.php');
}

else if ( isset($_SESSION['error'] ))
{
  $error = $_SESSION['error'] ;
  // Remove session variables
  session_unset();
  // Destroy the session
  session_destroy();
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <link href="css/style_sheet.css" rel='stylesheet' type='text/css'/>
    <link href="css/responsive_style.css" rel='stylesheet' type='text/css'/>
    <script src="js/helper.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>Game Stock Manager</title>


  </head>

  <body class="login_page">

     <div class="game_logo_login">
       <img src="images/Logo.png" width="110px" height="70px">
     </div>


      <div class="login_content">
        <div class="error_holder"><?php echo $error ?></div>
        <div class="panel-header"><h1>Game Stock Manager Login</h1></div>
        <div class="panel-body">

          <div class= "form">
            <!-- Use https -->
            <form name="login_form" action="utils/auth.php" method="post" onsubmit="return validateLoginForm()">
              <p>Enter your username:</p>
              <input type="text" name="username" value="">
              <p>Enter your password:</p>
              <input type="password" name="password" value="">
              <input type="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
  </body>
</html>

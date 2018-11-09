<?php
require('error_check.php');

session_start();
$session = $_SESSION['stock_user'] ;
if ( isset($session) && $session != '')
{
  $loggedIn = "<a href='logout.php'>Logout ". $session ."</a>" ;
}

else
{
  /*use https */
  header('Location: ../login.php');
}

 ?>

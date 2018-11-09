<?php
session_start();

require('connection.php') ;


if ( isset($_POST["username"]) && isset($_POST["password"]))
{
  $username = htmlentities($_POST["username"]) ;
  $password = htmlentities($_POST["password"]) ;
  validateUser($conn, $username, $password) ;

}
else
{
  header('Location: ../login.php');
}


function validateUser($conn, $username, $password)
{

  $stmt = $conn->prepare(
  "SELECT username, password FROM users
  WHERE username = ?
   ");

   $stmt->bind_param("s", $username );
   $stmt->bind_result($dbUsername, $dbPassword);
   $stmt->execute() ;
   $stmt->store_result();

   if ($stmt->num_rows > 0)
   {
   while ( $stmt->fetch() )
    {
        // Compare the user input to the stored encrypted password
        if ($dbPassword === crypt($password, $dbPassword))
        {

          $_SESSION["stock_user"] = $username ; // Initialise session
          header("location: ../index.php");
        }
        else
        {
          $error = "Invalid Password" ;
          $_SESSION["error"] = $error ;
          header("location: ../login.php");
        }
    }

  }
  else
  {
    $error = "Username not found in the database" ;
    $_SESSION["error"] = $error ;
    header("location: ../login.php");
  }
  $conn->close();
}

?>

<?php
require( 'utils/connection.php' );

$username = "Admin" ;
$password = "securepassword";

addUser( $conn, $username, $password );

function addUser($conn, $username, $password )
{

  // Use salt with random bytes to create encrypted password
  $rand = openssl_random_pseudo_bytes(48);
  $salt = '$7a$fj2a' . strtr(base64_encode($rand), array('_' => '.', '~' => '/'));
  // Create hashed encrypted password
  $hashed_password = crypt($password, $salt);

  //Check to see if password is equal to user input
  $sql = "INSERT INTO users( id, username, password ) VAlUES( NULL, '$username', '$hashed_password' )" ;

  if ($conn->query($sql) === TRUE)
  {
    echo "successful";
  }

  else {
    echo "Error" . $sql . "<br>" . $conn->error . "<br/>";
    }
}

?>

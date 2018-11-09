<?php
session_start();

require('connection.php');


$id = htmlentities($_POST["id"]);
$sql = "DELETE FROM games WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {

  if( $conn->affected_rows == 1 ) {
    $_SESSION["delete_success"] = "Record Deleted successfully.";
  }
  else { // If query was successful, but no rows were affected
    $_SESSION["delete_error"] = "This stock entry could not be found, please check the ID is correct.";
  }
} else {
    $_SESSION["delete_error"] = "Error: " . $conn->error;
}

$conn->close();
header('Location: ../add_stock.php')
?>

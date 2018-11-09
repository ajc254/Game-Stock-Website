<?php
session_start();

require('connection.php');

$id = htmlentities($_POST["id"]);

// If both fields were updated.
if( !empty($_POST["quantity"]) && !empty($_POST["price"]) ) { 

  $quantity = htmlentities($_POST["quantity"]);
  $price = htmlentities($_POST["price"]);
  $sql = "UPDATE games SET game_price = '$price', game_stock = '$quantity' WHERE id = '$id'";
}

// Only quantity was updated.
elseif( !empty($_POST["quantity"]) && empty($_POST["price"]) ) {

  $quantity = htmlentities($_POST["quantity"]);
  $sql = "UPDATE games SET game_stock = '$quantity' WHERE id = '$id'";
}

else { // Only price was updated.
  $price = htmlentities($_POST["price"]);
  $sql = "UPDATE games SET game_price = '$price' WHERE id = '$id'";
  }

if ($conn->query($sql) === TRUE) {

    if( $conn->affected_rows == 1 ){
      $_SESSION["update_success"] = "Record updated successfully.";
    }
    else {  // If query was successful, but no rows were affected
      $_SESSION["update_error"] = "This stock entry could not be found, please check the ID is correct.";
    }
} else {
    $_SESSION["update_error"] = "Error: " . $conn->error;
}

$conn->close();
header('Location: ../update_stock.php');
?>

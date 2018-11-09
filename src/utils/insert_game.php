<?php
session_start();

require('connection.php');


$title = strtoupper( htmlentities($_POST["title"]) );
$genre = htmlentities($_POST["genre"]);
$quantity = htmlentities($_POST["quantity"]);
$price = htmlentities($_POST["price"]);

$sql =
"INSERT INTO games (id, game_title, game_genre, game_price, game_stock) VALUES( NULL, '$title', '$genre', '$price', '$quantity');";

if ($conn->query($sql) === TRUE) {
    $_SESSION["add_success"] = "Record successfully created.";
} else {
    $_SESSION["add_error"] = "Error: " . $conn->error;
}

$conn->close();
header('Location: ../add_stock.php')
?>

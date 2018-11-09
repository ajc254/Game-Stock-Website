<!DOCTYPE html>

<?php
require("utils/check.php");
$success = null;
$error = null;

if( isset($_SESSION['add_success']) ) {
    $success = $_SESSION['add_success'];
    unset($_SESSION['add_success']);
}
elseif( isset($_SESSION['add_error']) ) {
  $error = $_SESSION['add_error'];
  unset($_SESSION['add_error']);
}
elseif( isset($_SESSION['delete_success']) ) {
    $success = $_SESSION['delete_success'];
    unset($_SESSION['delete_success']);
}
elseif( isset($_SESSION['delete_error']) ) {
  $error = $_SESSION['delete_error'];
  unset($_SESSION['delete_error']);
}
 ?>

<meta name="viewport" content="width=device-width, user-scalable=no"/>
<link href="css/style_sheet.css" rel='stylesheet' type='text/css'/>
<link href="css/responsive_style.css" rel='stylesheet' type='text/css'/>
<script src="js/helper.js"></script>
<body>
   <div class="game_logo">
     <img src="Images/Logo.png" width="110px" height="70px">
   </div>


    <ul class="topnav" id="index_topnav">
      <li class="firstli"></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="add_stock.php">Add/Remove Stock</a></li>
      <li><a href="update_stock.php">Update Stock</a></li>
      <li id="logged_in"><?php echo $loggedIn ?></li>
      <li class="icon">
        <a href="javascript:void(0);" onclick="showResponsiveMenu()">&#9776;</a>
     </li>
   </ul>
   <div class="success_holder"><?php echo $success; ?></div>
   <div class="error_holder"><?php echo $error; ?></div>
   <div class="panel-header"><h1>Add new game:</h1></div>
   <div class="panel-body" id="add_form">
     <div class="form">
      <form name="addStock" action="utils/insert_game.php" method="post">

        <p>Enter game title:</p>
        <input type="text" name="title" required/>

        <p>Enter game genre:</p>
        <select type="text" name="genre">
          <option value="Action">Action</option>
          <option value="Arcade">Arcade</option>
          <option value="Family">Family</option>
          <option value="Music">Musical</option>
          <option value="Racing">Racing</option>
          <option value="RPG">Role Playing</option>
          <option value="Simulation">Simulation</option>
          <option value="Sports">Sports</option>
          <option value="Strategy">Strategy</option>
        </select>

        <p>Enter Quantity</p>
        <input type="number" name="quantity" min="1" required>
        <p>Enter Price</p>
        <input type="number" name="price" min="0.01" step="0.01" required><br/>
        <input type = "submit" name = "submit" />
      </form>
    </div>
  </div>

  <div class="panel-header"><h1>Delete Game:</h1></div>
  <div class="panel-body" id="add_form">
    <div class="form">
      <form name="deleteStock" action="utils/delete_game.php" method="post">

        <p>Enter ID of game to delete:</p>
        <input type="number" name="id" min="1" required>
        <input type = "submit" name = "submit" />
      </form>
    </div>
  </div>
</html>

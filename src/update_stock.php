<?php
require("utils/check.php");
$success = null;
$error = null;

if( isset($_SESSION['update_success']) ) {
    $success = $_SESSION['update_success'];
    unset($_SESSION['update_success']);
}
elseif( isset($_SESSION['update_error']) ) {
  $error = $_SESSION['update_error'];
  unset($_SESSION['update_error']);
}
 ?>

<meta name="viewport" content="width=device-width, user-scalable=no"/>
<script src="js/helper.js"></script>
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
   <div class="panel-header"><h1>Update Stock:</h1></div>
   <div class="panel-body" id="add_form">
    <div class="form">
      <form name = "updateStock" action = "utils/update_game.php" method = "post" onsubmit="return validateUpdateForm()">

        <p>Enter ID of game to update:</p>
        <input type="number" name="id" min=1 required/>
        <p>Enter New Quantity</p>
        <input type="number" name="quantity" min="1">
        <p>Enter New Price</p>
        <input type="number" name="price" min="0.01" step="0.01"><br/>
        <input type = "submit" name = "submit" />
      </form>
    </div>
  </div>
</html>

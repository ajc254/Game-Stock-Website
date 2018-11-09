<?php
require("utils/check.php");
 ?>

<html>
  <head>
    <link href="css/style_sheet.css" rel='stylesheet' type='text/css'/>
    <link href="css/responsive_style.css" rel='stylesheet' type='text/css'/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/helper.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>Game Stock Manager</title>

  </head>

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

      <div class="content">
        <div class="filter_container"><p>Search for Title:</p></div>
          <div class="form">
            <form name="searchForm" id="searchForm">

              <p>Enter title of game to search for:</p>
              <input type="text" name="search" id="search">
              <input type = "submit" name = "submit"></input>
            </form>
          </div>


        <div class="panel-header"><h1>Current Game Stock:</h1></div>
        <div class="panel-body" id="stock">
          <span class="fa fa-spinner fa-spin fa-5x" style="padding:40px;"></span>
        </div>
      </div>
  </body>
</html>

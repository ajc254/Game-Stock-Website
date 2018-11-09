<?php
header('Access-Control-Allow-Origin: *');
require ("connection.php") ;

getGamesJSON($conn);

function getGamesJSON($conn)
  {
    // retrieve the filter search provided by the user
    $search = $_GET['search'];

    $sql = "SELECT id, game_title, game_genre, game_price, game_stock FROM games WHERE game_title LIKE '%$search%' ORDER BY game_title ASC";



    $stmt = $conn->prepare($sql) ;

    $stmt->bind_result($dbGameID, $dbGameTitle, $dbGameGenre, $dbGamePrice, $dbGameStock);
    $stmt->execute();
    $stmt->store_result();

    $gamesArray = array() ;

      while ( $stmt->fetch() )
      {
        $gamesArray[] = array ('id' => $dbGameID, 'title' => $dbGameTitle, 'genre' => $dbGameGenre, 'price' => $dbGamePrice, 'stock' =>  $dbGameStock);
      }

    $dataArray["data"] = array ('games' => $gamesArray) ;

    echo json_encode($dataArray) ;
}

?>

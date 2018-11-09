
// Enables the responsive behaviour
function showResponsiveMenu()
{
    var topNav = document.getElementById("index_topnav");
    if (topNav.className === "topnav")
    {
        topNav.className += " responsive";
    }
    else
    {
        topNav.className = "topnav";
    }
}

//Javascript to validate forms where input is required
function validateLoginForm()
{
  var userField = document.forms["login_form"]["username"].value;
  var passField = document.forms["login_form"]["password"].value;
  if (userField == "" || passField == "")
  {
      alert("You must enter a username and password");
      return false;
  }
}

function validateUpdateForm() {

  var quantityField = document.forms["updateStock"]["quantity"].value;
  var priceField = document.forms["updateStock"]["price"].value;
  if ( quantityField == "" && priceField == "" ) {
    alert("You must enter a value for quantity field or price field.")
    return false;
  }
}


 function loadGamesJSON() {

   var search = $('#search').val();

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4) {
     switch(this.status){
     case 200:
       renderJSON(this);
       break ;
     case 404:
       var error = this.status + " " + this.statusText ;
       showError(error) ;
       break ;
     case 500:
       var error = this.status + " " + this.statusText ;
       showError(error) ;
       break ;
      }
     }
   };

   xhttp.open("GET", "utils/get_games.php?search="+search, true);
   xhttp.send();
}

function renderJSON(data)
{
   var jsonData = JSON.parse(data.responseText);
   var games = jsonData.data.games;

   if( games.length ) { // If a record was found by the search.
     var output =
     '<table id="games_list">' +
     '<th>ID</th>' +
     '<th>Game Title</th>' +
     '<th>Genre</th>' +
     '<th>Price (£)</th>' +
     '<th>Stock Quantity</th>';

     for (var i = 0; i < games.length; i++)
     {
       data ="<td>"+ games[i].id +"</td><td>"+
       games[i].title + "</td><td>"+
       games[i].genre + "</td><td>"+
       games[i].price + "</td><td>"+
       games[i].stock + "</td>" ;
       output += "<tr>" + data + "</tr>" ;
     }
   }
   else {
     output = '<table id=games_list><th>No games found.</th>';
   }
   output += '</table>';
   $('.panel-body').html(output);
}

// prevent auto page refresh behaviour of submit button
$(document).ready(function(){
  loadGamesJSON();
  $('#searchForm').on('submit', function(e){
    e.preventDefault();
    loadGamesJSON();
  })
});

 function showError($error)
 {
   console.log($error) ;
 }

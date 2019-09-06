<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Movie Listings</title>
        <!---css-->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Movie Listings</h1>
    <?php
      //connect to the database
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      //prepare the query
      $sql = "SELECT * FROM movies";
      //run the query and store the results
      $cmd = $conn -> prepare($sql);
      $cmd -> execute();
      $movies = $cmd ->fetchAll();
      //start our grid
      echo '<table class="table table-striped table-hover"><thread><th>Title</th><th>Year</th><th>Length</th><th>Url</th></thread><tbody>';
      //loop through the data and display results
      foreach ($movies as $movies) {
        // code...
        echo '<tr><td>' . $movies['title'] .'</td>
                  <td>' . $movies['year'] .'</td>
                  <td>' . $movies['length'] .'</td>
                  <td>' . $movies['url'] .'</td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>

     <!---js--->
     <script src="js/bootstrap.min.js"></script>
  </body>
</html>

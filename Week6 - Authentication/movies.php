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
      echo '<table class="table table-striped table-hover"><thread><th>Title</th><th>Year</th><th>Length</th><th>Url</th><th>Edit</th><th>Delete</th></thread><tbody>';
      //loop through the data and display results
      foreach ($movies as $movies) {
        // code...
        echo '<tr><td>' . $movies['title'] .'</td>
                  <td>' . $movies['year'] .'</td>
                  <td>' . $movies['length'] .'</td>
                  <td>' . $movies['url'] .'</td>
                  <td><a href="movie.php?movie_id='.$movies['movie_id'].'">Edit</a>'.'</td>
                  <td><a href="delete-movie.php?movie_id='.$movies['movie_id'].'" onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</a></td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>

     <?php
       // access the current session

       session_start();

       // check if there is a user identity stored in the session object
       if(empty($_SESSION['user_id'])) {
          // if there is no user_id in the session, redirect the user to the login page
          header('location:login.php');
          exit();
       }
       ?>


     <!---js--->
     <script src="js/bootstrap.min.js"></script>
  </body>
</html>

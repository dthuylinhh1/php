<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Book Listings</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Books Listings</h1>
    <?php
      //connect to the database
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      //prepare the query
      $sql = "SELECT * FROM books";
      //run the query and store the results
      $cmd = $conn -> prepare($sql);
      $cmd -> execute();
      $books = $cmd ->fetchAll();
      //start our grid
      echo '<table class="table table-striped table-hover"><thread><th>Title</th><th>Author</th><th>Year</th><th>Edit</th><th>Delete</th></thread><tbody>';
      //loop through the data and display results
      foreach ($books as $books) {
        // code...
        echo '<tr><td>' . $books['title'] .'</td>
                  <td>' . $books['author'] .'</td>
                  <td>' . $books['year'] .'</td>
                  <td><a href="book.php?book_id='.$books['book_id'].'">Edit</a>'.'</td>
                  <td><a href="delete-book.php?book_id='.$books['book_id'].'" onclick="return confirm(\'Are you sure you want to delete this book?\');">Delete</a></td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>
     <?php

     // access the current session

     session_start();

     // check if there is a user identity stored in the session objectif
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Book Listings</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1>Books</h1>
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
      echo '<table class="table table-striped table-hover"><thread><th>Title</th><th>Author</th><th>Year</th></thread><tbody>';
      //loop through the data and display results
      foreach ($books as $book) {
        // code...
        echo '<tr><td>' . $book['title'] .'</td>
                  <td>' . $book['author'] .'</td>
                  <td>' . $book['year'] .'</td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>
  </body>
</html>

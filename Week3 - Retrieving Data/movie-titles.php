<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/htm; charset=utf-8" http-equiv="content-type">
    <title>Movie Titles</title>
  </head>
  <body>
    <?php
      //connect to the database
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      //Set up the SQP querry
      $sql = "SELECT title FROM movies";
      //Run query and store the results
      $cmd = $conn ->prepare($sql);
      $cmd -> execute();
      $movies = $cmd->fetchAll();
      //loop through the query results and display each record on  our page
      foreach ($movies as $movies) {
        // code...
        echo $movies['title'] . '<br />';
      }
      //disconnect
      $conn = null;
     ?>

  </body>
</html>

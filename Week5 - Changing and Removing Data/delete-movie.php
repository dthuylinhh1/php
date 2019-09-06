<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Delete your movie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  </head>
  <body>
    <?php
      // capture the selected movie_id from the url and store it in a variable with the same name
      $movie_id = $_GET['movie_id'];
      // connect to db
      $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');

      // set up the SQL command
      $sql = "DELETE FROM movies WHERE movie_id = :movie_id";

      // create a command object so we can populate the movie_id value, the run the deletion
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
      $cmd->execute();

      //disconnect
      $conn = null;
      header('location:movies.php');
     ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Display Movie Details</title>
    <!---css--->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Movie Details</h1>
    <?php
      $title = $_POST['title'];

      //set the query and fetch the selected movies
      $sql = "SELECT * FROM movies WHERE title= :title";
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      $cmd = $conn->prepare($sql);
      //fill the :title parameter with our $title variable before running the query
      $cmd ->bindParam(':title',$title, PDO::PARAM_STR, 50);
      $cmd -> execute();
      $movie = $cmd->fetch();

      echo 'Movie Title: ' . $movie['title']. '<br />
            Year: ' . $movie['year']. '<br />
            Length: ' . $movie['length']. '<br />
            Url: <a href="' . $movie['url'] . '">' . $movie['url'] . '</a>';

      $conn = null;
     ?>
    <!---js--->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

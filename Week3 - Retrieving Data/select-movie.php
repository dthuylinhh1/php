<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Select a Movie</title>
    <!---css--->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Select a Movie</h1>
    <form method="post" action="display-movie.php">
      <fieldset>
        <label for="title">Title:</label>
        <select id="title" name="title">
          <?php
            //get the movie titles and fill the dropdown list

            $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
            $sql = "SELECT title FROM movies ORDER BY title";
            $cmd = $conn ->prepare($sql);
            $cmd -> execute();
            $movies = $cmd->fetchAll();
            //add each movie title to the dropdown, wrapped in <option> tags
            foreach ($movies as $movie) {
              // code...
              echo '<option>' . $movie['title']. '</option>';
            }
            //disconnect
            $conn = null;
           ?>
        </select>
        <button class="btn btn-primary">Go</button>
      </fieldset>

    </form>
    <!---js--->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

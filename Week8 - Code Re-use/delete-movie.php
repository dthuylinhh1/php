  <?php ob_start();
    //authentication check
    require_once('authentication.php');
      // capture the selected movie_id from the url and store it in a variable with the same name
      $movie_id = $_GET['movie_id'];
      // connect to db
      require('db.php');

      // set up the SQL command
      $sql = "DELETE FROM movies WHERE movie_id = :movie_id";

      // create a command object so we can populate the movie_id value, the run the deletion
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
      $cmd->execute();

      //disconnect
      $conn = null;
      header('location:movies.php');
      //footer
    required_once('footer.php');
    ob_flush();
?>

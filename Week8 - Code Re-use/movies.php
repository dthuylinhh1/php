      <?php ob_start();
      //authentication check
      require_once('authentication.php');

      //set the page title
      $page_title = null;
      $page_title = 'Movie Listings';
      //embed the header
      require_once('header.php');

      //connect to the database
      require('db.php');
      //prepare the query
      $sql = "SELECT * FROM movies";
      //run the query and store the results
      $cmd = $conn -> prepare($sql);
      $cmd -> execute();
      $movies = $cmd ->fetchAll();
      //start our grid
      echo '<a href="movie.php" title = "Add a New Movie"> Add a New Movie </a>
      <table class="table table-striped table-hover"><thread><th>Title</th><th>Year</th><th>Length</th><th>Url</th><th>Edit</th><th>Delete</th></thread><tbody>';
      //loop through the data and display results
      foreach ($movies as $movies) {
        // code...
        echo '<tr><td>' . $movies['title'] .'</td>
                  <td>' . $movies['year'] .'</td>
                  <td>' . $movies['length'] .'</td>
                  <td><a href="' . $movies['url'] .'">'.$movies['url'].'</a></td>
                  <td><a href="movie.php?movie_id='.$movies['movie_id'].'">Edit</a>'.'</td>
                  <td><a href="delete-movie.php?movie_id='.$movies['movie_id'].'" onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</a></td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
      //embed footer
        require_once('footer.php');
        ob_flush();
       ?>

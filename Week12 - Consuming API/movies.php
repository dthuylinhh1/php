<script src="js/sorttable.js"></script>
      <?php ob_start();;
      //authentication check
      require_once('authentication.php');
      //set the page title
      $page_title = null;
      $page_title = 'Movie Listings';
      //embed the header
      require_once('header.php');

      // check if the user entered keywords for searching
      $keywords = null;

      if (!empty($_GET['keywords'])) {
          $keywords = $_GET['keywords'];
      }
      //connect to the database
      try{
        require('db.php');
        //prepare the query
        $sql = "SELECT * FROM movies";
        $word_list=null;
        // check if the user entered keywords for searching
        if (!empty($keywords)) {
         // start the WHERE clause MAKING SURE to include spaces around the word WHERE
         $sql .= " WHERE ";

         // split the keywords into an array of individual words
         $word_list = explode(" ", $keywords);

         // start a counter so we know which element in the array we are at
         $counter = 0;

         $search_type = $_GET['search_type'];
         // loop through the word list and add each word to the where clause individually
         foreach($word_list as $word) {

         $word_list[$counter] = "%" . $word . "%";
         // for the first word OMIT the word OR
         if ($counter == 0) {
         $sql .= " title LIKE ?";
         }
         else {
         $sql .= "$search_type title LIKE ?";
         }

         // increment counter
         $counter++;
         }
        }
        //run the query and store the results
        $cmd = $conn -> prepare($sql);
        $cmd -> execute($word_list);
        $movies = $cmd ->fetchAll();
        //start our grid
        echo '<div class="col-sm-6">
            <a href="movie.php" title="Add Movie">Add a New Movie</a>
        </div>
        <div class="col-sm-6">
          <form method="get" action="movies.php">
          <label for="keywords">Enter Keywords to Search:</label>
          <input name="keywords"/>
          <select name="search_type">
            <option value="OR">Any Keyword</option>
            <option value="AND">All Keywords</option>
        </select>
          <button type="submit" class="btn btn-success">Search</button>
          </form>
        </div>
        <table class="sortable table table-striped table-hover"><thread><th>Title</th><th>Year</th><th>Length</th><th>Url</th><th>Edit</th><th>Delete</th></thread><tbody>';
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
      }
      catch (Exception $e) {
        mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
        header('location:error.php');
      }
      //embed footer
      require_once('footer.php');
      ob_flush();
       ?>

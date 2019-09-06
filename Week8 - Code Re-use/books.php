    <h1>Books Listings</h1>
    <?php ob_start();
    //authentication check
    require_once('authentication.php');

    //set the page title
    $page_title = null;
    $page_title = 'Book Listings';
    //embed the header
    require_once('header.php');

    //connect to the database
    require('db.php');
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
      //embed footer
        require_once('footer.php');
        ob_flush();
     ?>
     

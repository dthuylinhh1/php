    <?php ob_start();
      // authentication check
      require_once('authentication.php');
      //set the page title
      $page_title = null;
      $page_title = 'Main Menu';
      //embed the header
      require_once('header.php');

    ?>
    <main class="container">

   <h1>COMP1006 Application</h1>

   <li class="list-group-item"><a href="movies.php" title="Movies">Movies</a></li>
   <li class="list-group-item"><a href="books.php" title="Books">Books</a></li>


  </main>


    <?php
    //embed footer
    require_once('footer.php');
    ob_flush();
     ?>

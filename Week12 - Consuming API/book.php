<?php
  //authentication check
  require_once('authentication.php');
  //set the page title
  $page_title = null;
  $page_title = 'Book Details';
  //embed the header
  require_once('header.php');

    $book_id = '';
    $title='';
    $author='';
    $year='';
    $photo ='';
    // check the url for a movie_id parameter and store the value in a variable if we find one
    if (empty($_GET['book_id']) == false) {
      $book_id = $_GET['book_id'];

    try{
      // connect
      require('db.php');

      // write the sql query
      $sql = "SELECT * FROM books WHERE book_id = :book_id";

      // execute the query and store the results
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
      $cmd->execute();
      $book = $cmd->fetch();

      // populate the fields for the selected movie from the query result
      $title = $book['title'];
      $author = $book['author'];
      $year = $book['year'];
      $photo = $book['photo'];

      // disconnect
      $conn = null;
    }
    catch (Exception $e) {
      mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
      header('location:error.php');
    }
  }

?>
  <div class="container">
  <h1>Book Details</h1>
  <form action="save-book.php" method="post" enctype="multipart/form-data">
    <fieldset class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input name="title" id="title" required value="<?php echo $title; ?>" />
            </fieldset>
            <fieldset class="form-group">
               <label for="author" class="col-sm-2">Author:</label>
               <input name="author" id="author" required type="author" value="<?php echo $author; ?>" />
           </fieldset>
             <fieldset class="form-group">
                <label for="year" class="col-sm-2">Year:</label>
                <input name="year" id="year" required type="number" value="<?php echo $year; ?>" />
            </fieldset>
            <fieldset class="form-group">
               <label for="photo" class="col-sm-2">Photo:</label>
               <input name="photo" id="photo" required type="file"/>
           </fieldset>
           <?php if (!empty($photo)) { ?>
             <div class="col-sm-offset-2">
               <img src="images/<?php echo $photo; ?>" alt="Book Posters"/>
             </div>
           <?php } ?>
             <input name="book_id" type="hidden" value="<?php echo $book_id; ?>" />
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
<?php
  //embed footer
    require_once('footer.php');

?>

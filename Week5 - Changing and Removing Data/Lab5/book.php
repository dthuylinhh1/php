<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your book</title>
    <!--- Link to the Bootstrap css--->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  </head>
  <body>
    <?php
    $title='';
    $author='';
    $year='';
    // check the url for a movie_id parameter and store the value in a variable if we find one
    if (empty($_GET['book_id']) == false) {
    $book_id = $_GET['book_id'];

    // connect
    $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');

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

    // disconnect
    $conn = null;
  }

     ?>
  <div class="container">
  <h1>Book Details</h1>
  <form action="save-book.php" method="post">
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
             <input name="book_id" type="hidden" value="<?php echo $book_id; ?>" />
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Delete your Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  </head>
  <body>
    <?php
      // capture the selected book_id from the url and store it in a variable with the same name
      $book_id = $_GET['book_id'];
      // connect to db
      $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');

      // set up the SQL command
      $sql = "DELETE FROM books WHERE book_id = :book_id";

      // create a command object so we can populate the book_id value, the run the deletion
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
      $cmd->execute();

      //disconnect
      $conn = null;
      header('location:books.php');
     ?>
  </body>
</html>

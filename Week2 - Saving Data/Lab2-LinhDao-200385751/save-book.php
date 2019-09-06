<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Save your book</title>
  </head>
  <body>
  <?php
  //Create and fill a local variable from the form input
  // save form inputs into variables
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    // connect to the database
    $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751', 'gcc200385751', 'H_p8ZQQuqa');

    // set up the SQL INSERT command
    $sql = "INSERT INTO books (title, author, year) VALUES (:title, :author, :year)";

    // create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
    $cmd->bindParam(':author', $author, PDO::PARAM_STR, 100);
    $cmd->bindParam(':year', $year, PDO::PARAM_INT);

    // execute the command
    $cmd->execute();

    // disconnect from the database
    $conn = null;

    // show confirmation
    echo "Book Saved";

   ?>
  </body>
</html>

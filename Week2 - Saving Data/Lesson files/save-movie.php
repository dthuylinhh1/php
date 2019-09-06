<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Showing your email</title>
  </head>
  <body>
  <?php
  //Create and fill a local variable from the form input
  // save form inputs into variables
    $title = $_POST['title'];
    $year = $_POST['year'];
    $length = $_POST['length'];
    $url = $_POST['url'];

    // connect to the database
    $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');

    // set up the SQL INSERT command
    $sql = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";

    // create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
    $cmd->bindParam(':year', $year, PDO::PARAM_INT);
    $cmd->bindParam(':length', $length, PDO::PARAM_INT);
    $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);

    // execute the command
    $cmd->execute();

    // disconnect from the database
    $conn = null;

    // show confirmation
    echo "Movie Saved";

   ?>
  </body>
</html>

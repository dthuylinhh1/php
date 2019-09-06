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
    // create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($author)) {
    // notify the user
    echo 'Author is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($year)) {
    // notify the user
    echo 'Year is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($year) == false) {
    echo 'Year is invalid<br />';
    $ok = false;
}
// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {
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
}
    // show confirmation
    echo "Book Saved";

   ?>
  </body>
</html>

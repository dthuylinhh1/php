<?php

//authentication check
require_once('authentication.php');

//header
$page_title = null;
$page_title = 'Saving your Movie...';
require_once('header.php');
// store the movie_id if we are editing.  if we are adding, this value will be empty (which is ok)
$movie_id = $_POST['movie_id'];
//Create and fill a local variable from the form input
// save form inputs into variables
$title = $_POST['title'];
$year = $_POST['year'];
$length = $_POST['length'];
$url = $_POST['url'];

$photo = null;

//process photo upload if there is one
if(!empty($_FILES['photo'])){
  $photo = $_FILES['photo']['name'];

  if($_FILES['photo']['type'] != 'image/jpeg'){
    echo 'Invalid photo<br />';
    $ok = false;
  }
  else{
    //valid photo
    session_start();
    $final_name = session_id().'_'. $photo;
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "images/$final_name");
  }
}

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';

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

if (empty($length)) {
    // notify the user
    echo 'Title is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($length) == false) {
    echo 'Length is invalid<br />';
    $ok = false;
}

if (empty($url)) {
    // notify the user
    echo 'URL is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {
  try{
      // connect to the database
      require('db.php');


    if (empty($movie_id)) {
            // set up the SQL INSERT command
            $sql = "INSERT INTO movies (title, year, length, url, photo) VALUES (:title, :year, :length, :url, :photo)";
        }
        else {
            // set up the SQL UPDATE command to modify the existing movie
            $sql = "UPDATE movies SET title = :title, year = :year, length = :length, url = :url, photo = :photo WHERE movie_id = :movie_id";
        }


      // create a command object and fill the parameters with the form values
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
      $cmd->bindParam(':year', $year, PDO::PARAM_INT);
      $cmd->bindParam(':length', $length, PDO::PARAM_INT);
      $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);
      $cmd->bindParam(':photo', $final_name, PDO::PARAM_STR, 100);

      // fill the movie_id if we have one
      if (!empty($movie_id)) {
          $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
      }

      // execute the command
      $cmd->execute();

      // disconnect from the database
      $conn = null;
     // move all the save code we wrote last week in here, starting with the database connection and ending with the disconnect command

   }
   catch (Exception $e) {
     mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
     header('location:error.php');
   }
   // show confirmation
   echo "Movie Saved";
   //header('location:movies.php');
}
required_once('footer.php');

?>

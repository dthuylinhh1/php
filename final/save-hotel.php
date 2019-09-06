<?php 

//page title
$page_title = null;
$page_title = 'Edit Hotel Information...';
//header
require_once('header.php');

// store the hotel_id for editting
$hotelId = $_POST['hotelId'];

//Create and fill a local variable from the form input
// save form inputs into variables
$name = $_POST['name'];
$address = $_POST['address'];
$town = $_POST['town'];
$photo = $_POST['photo'];
$rating = $_POST['rating'];

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($name)) {
    // notify the user
    echo 'Name is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($address)) {
    // notify the user
    echo 'Address is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($town)) {
    // notify the user
    echo 'Town is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($rating)) {
    // notify the user
    echo 'Rating is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($rating) == false) {
    echo 'Rating is invalid<br />';
    $ok = false;
}
// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {

  $sql = "UPDATE hotel SET name = :name, address = :address, town = :town, photo = :photo, rating = :rating WHERE hotelId = :hotelId";

  // create a command object and fill the parameters with the form values
  $cmd = $conn->prepare($sql);
  $cmd->bindParam(':name', $name, PDO::PARAM_STR, 255);
  $cmd->bindParam(':address', $address, PDO::PARAM_STR, 255);
  $cmd->bindParam(':town', $town, PDO::PARAM_STR, 50);
  $cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 255);
  $cmd->bindParam(':rating', $rating, PDO::PARAM_INT);

  // fill the movie_id if we have one
  if (!empty($hotelId)) {
      $cmd->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
  }

  // execute the command
  $cmd->execute();

  // disconnect from the database
  $conn = null;
}
  echo "Hotel Information Saved";
  //header('location:hotels.php');

 ?>

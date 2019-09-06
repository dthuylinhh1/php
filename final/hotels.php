<?php ob_start();
$page_title = null;
$page_title = 'Hotel Listings';

require_once('header.php');

//connect to the db
require_once('db.php');

$town = $_GET['town'];
//set the query
$sql = "SELECT * FROM hotel WHERE town =:town";

//run the query and store the results
$cmd = $conn -> prepare($sql);

//fill the :network_name parameter with our $network_name variable before running the query
$cmd ->bindParam(':town',$town, PDO::PARAM_STR, 50);
$cmd -> execute();
$hotels = $cmd ->fetchAll();

//start our grid
echo '<table class="sortable table table-striped table-hover"><thread><th>Name</th><th>Address</th><th>Town Name</th><th>Photo</th><th>Rating</th><th>Edit</th></thread><tbody>';
//loop through the data and display results
foreach ($hotels as $hotel) {
  // code...
  echo '<tr><td>' . $hotel['name'] .'</td>
            <td>' . $hotel['address'] .'</td>
            <td>' . $hotel['town'] .'</td>
            <td>' . $hotel['photo'] .'</td>
            <td>' . $hotel['rating'] .'</td>
            <td><a href="edit.php?hotelId='.$hotel['hotelId'].'">Edit</a>'.'</td>
            </tr>';
}
//close the grid
echo '</tbody></table>';
//disconnect
$conn = null;

//footer
require_once('footer.php');
ob_flush();
?>

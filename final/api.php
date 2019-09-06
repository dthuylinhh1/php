<?php
// connect
require_once('db.php');
// get movies
$sql = "SELECT * FROM hotel";
if (!empty($_GET['name'])) {
 $sql .= " WHERE name = :name";
 $cmd = $conn->prepare($sql);

 $title = $_GET['name'];
 $cmd->bindParam(':name', $name, PDO::PARAM_STR, 255);
}
else {
 $cmd = $conn->prepare($sql);
}
$cmd->execute();
$hotels = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert the movies data to a json object and output it
$json_obj = json_encode($hotels);

echo $json_obj;

// disconnect
$conn = null;
?>

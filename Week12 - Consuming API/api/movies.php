<?php
// connect
require_once('../db.php');
// get movies
$sql = "SELECT * FROM movies";
if (!empty($_GET['title'])) {
 $sql .= " WHERE title = :title";
 $cmd = $conn->prepare($sql);

 $title = $_GET['title'];
 $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
}
else {
 $cmd = $conn->prepare($sql);
}
$cmd->execute();
$movies = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert the movies data to a json object and output it
$json_obj = json_encode($movies);

echo $json_obj;

// disconnect
$conn = null;
?>

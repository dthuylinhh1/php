<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Get Shows</title>
    <!---css--->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Show Details</h1>
    <?php
      $network_name = $_POST['network_name'];

      //set the query and fetch the selected network
      $sql = "SELECT * FROM shows WHERE network_name= :network_name";
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      $cmd = $conn->prepare($sql);
      //fill the :network_name parameter with our $network_name variable before running the query
      $cmd ->bindParam(':network_name',$network_name, PDO::PARAM_STR, 50);
      $cmd -> execute();
      $network = $cmd->fetchAll();

      //start grid
      echo '<table class="table table-striped table-hover"><thread><th>Show Name</th><th>First Year</th><th>Network Name</th></thread><tbody>';
      //loop through the data and display results
      foreach ($network as $network) {
        // code...
        echo '<tr><td>' . $network['show_name'] .'</td>
                  <td>' . $network['first_year'] .'</td>
                  <td>' . $network['network_name'] .'</td>
                  </tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>
    <!---js--->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

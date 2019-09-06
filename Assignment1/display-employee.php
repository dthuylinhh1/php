<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Assignment 1 - Employee Listings</title>
        <!--- Link to the Bootstrap css--->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
        <style>
        /* Set styling to body */
          body{
            font-family: "Lucida Console", Monaco, monospace;
            background-color: gold;
            text-decoration-style: double;
          }
          h1{
            text-align: center;
            text-decoration: underline;
          }
          footer{
            text-align: center;
            padding: 10px 15px;
          }
          /* Rules for anchor elements to control the link states*/
          a:link{
            color: blue;
            text-decoration: underline;
          }

          a:visited{
            color: yellowgreen;
            text-decoration: underline;
          }

          a:hover{
            color: blue;
            background-color: yellow;
          }

          a:active{
            color: hotpink;
            text-decoration: underline;
          }
        </style>
  </head>
  <body>
    <h1>Employee Listings</h1>
    <?php
      //connect to the database
      $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
      //prepare the query
      $sql = "SELECT * FROM employees ORDER BY firstname";
      //run the query and store the results
      $cmd = $conn -> prepare($sql);
      $cmd -> execute();
      $employees = $cmd ->fetchAll();
      //start our grid
      echo '<table class="table table-striped table-hover"><thread><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Birth Place</th></thread><tbody>';
      //loop through the data and display results
      foreach ($employees as $employees) {
        // code...
        echo '<tr><td>' . $employees['employee_id'] .'</td>
                  <td>' . $employees['firstname'] .'</td>
                  <td>' . $employees['lastname'] .'</td>
                  <td>' . $employees['position'] .'</td>
                  <td>' . $employees['birthplace'] .'</td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
     ?>

     <!-- Latest compiled and minified JavaScript -->
     <script src="js/bootstrap.min.js"></script>
     <footer>
       <p><small>&copy; Assignment 1 - Linh Dao - 200385751</small></p>
       <p><small><a href="employee.php" title="Add New Employee">Click to Add New Employee</a></small></p>
     </footer>
  </body>
</html>

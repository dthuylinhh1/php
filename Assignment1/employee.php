<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Assignment 1 - Employee Information</title>
    <!--- Link to the Bootstrap css--->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
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
  <div class="container">
  <h1>Employee Details</h1>
  <form action="save-employee.php" method="post">
    <fieldset class="form-group">
      <label for="employee_id" class="col-sm-2">Employee ID: </label>
      <input name="employee_id" id="employee_id" required type="number">
    </fieldset>
    <fieldset class="form-group">
      <label for="firstname" class="col-sm-2">First Name: </label>
      <input name="firstname" id="firstname" required>
    </fieldset>
    <fieldset class="form-group">
      <label for="lastname" class="col-sm-2">Last Name: </label>
      <input name="lastname" id="lastname" required>
    </fieldset>
    <fieldset class="form-group">
      <label for="position" class="col-sm-2">Position: </label>
      <select id="position" name="position" required>
        <?php
          //get the position and fill the dropdown list
          //connect to the db
          $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
          //set up the SQL query
          $sql = "SELECT position FROM employee_position ORDER BY position";
          //run the query and store the results
          $cmd = $conn ->prepare($sql);
          $cmd -> execute();
          $positions = $cmd->fetchAll();
          //add each position to the dropdown, wrapped in <option> tags
          foreach ($positions as $position) {
            // code...
            echo '<option>' . $position['position']. '</option>';
          }
          //disconnect
          $conn = null;
         ?>
      </select>
    </fieldset>
    <fieldset class="form-group">
      <label for="birthplace" class="col-sm-2">Birth Place:</label>
      <input name="birthplace" id="birthplace" required>
    </fieldset>
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <footer>
    <p><small>&copy; Assignment 1 - Linh Dao - 200385751</small></p>
    <p><small><a href="display-employee.php" title="View Employees">Click to View Employees</a></small></p>
  </footer>
  </body>

</html>

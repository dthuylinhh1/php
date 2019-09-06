<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Assignment 1 - Save Employee Information</title>
    <style>
    /* Set styling to body */
      body{
        font-family: "Lucida Console", Monaco, monospace;
        background-color: gold;
        text-decoration-style: double;
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
  <?php
  //Create and fill a local variable from the form input
  // save form inputs into variables
    $employee_id = $_POST['employee_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $position = $_POST['position'];
    $birthplace = $_POST['birthplace'];
    // create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($employee_id)) {
    // notify the user
    echo 'Employee ID is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($employee_id) == false) {
    echo 'Employee ID is invalid<br />';
    $ok = false;
}


if (empty($firstname)) {
    // notify the user
    echo 'First name is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($lastname)) {
    // notify the user
    echo 'Last name is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($position)) {
    // notify the user
    echo 'Position is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($birthplace)) {
    // notify the user
    echo 'Birthplace is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {
    // connect to the database
    $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751', 'gcc200385751', 'H_p8ZQQuqa');

    // set up the SQL INSERT command
    $sql = "INSERT INTO employees (employee_id, firstname, lastname, position, birthplace) VALUES (:employee_id, :firstname, :lastname, :position, :birthplace)";

    // create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    $cmd->bindParam(':firstname', $firstname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lastname', $lastname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':position', $position, PDO::PARAM_STR, 20);
    $cmd->bindParam(':birthplace', $birthplace, PDO::PARAM_STR, 50);

    // execute the command
    $cmd->execute();

    // disconnect from the database
    $conn = null;
}
    // show confirmation
    echo "Employee Saved Successfully!";

   ?>
   <footer>
     <p><small>&copy; Assignment 1 - Linh Dao - 200385751</small></p>
     <p><small><a href="display-employee.php" title="View Employees">Click to View Employees</a></small></p>
   </footer>
  </body>
</html>

<?php
//authentication check
require_once('authentication.php');

//header
$page_title = null;
$page_title = 'Saving your Employee...';
require_once('header.php');
// store the employee_id if we are editing.  if we are adding, this value will be empty (which is ok)
$employee_id = $_POST['employee_id'];
//Create and fill a local variable from the form input
// save form inputs into variables
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$position = $_POST['position'];
$birthplace = $_POST['birthplace'];
$department = $_POST['department'];

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

if (empty($department)) {
    // notify the user
    echo 'Department is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {
  try{
    // connect to the database
    require('db.php');

    if (empty($employee_id)) {
            // set up the SQL INSERT command
            $sql = "INSERT INTO employees(firstname, lastname, position, birthplace, department, photo) VALUES (:firstname, :lastname, :position, :birthplace, :department, :photo)";
        }
        else {
            // set up the SQL UPDATE command to modify the existing employee
            $sql = "UPDATE employees SET firstname = :firstname, lastname = :lastname, position = :position, birthplace = :birthplace, department = :department, photo =:photo WHERE employee_id = :employee_id";
        }

    // create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':firstname', $firstname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lastname', $lastname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':position', $position, PDO::PARAM_STR, 20);
    $cmd->bindParam(':birthplace', $birthplace, PDO::PARAM_STR, 50);
    $cmd->bindParam(':department', $department, PDO::PARAM_STR, 50);
    $cmd->bindParam(':photo', $final_name, PDO::PARAM_STR, 100);

    // fill the employee_id if we have one
    if (!empty($employee_id)) {
        $cmd->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    }

    // execute the command
    $cmd->execute();

    // disconnect from the database
    $conn = null;
  }
  catch (Exception $e) {
    mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
    header('location:error.php');
  }
}
    // show confirmation
    echo "Employee Information Saved Successfully!";
    //header('location:display-employee.php');
    //footer
    required_once('footer.php');
?>

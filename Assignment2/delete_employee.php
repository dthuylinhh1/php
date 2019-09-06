<?php ob_start();
    //authentication check
    require_once('authentication.php');
    // capture the selected movie_id from the url and store it in a variable with the same name
    $employee_id = $_GET['employee_id'];
    try{
      // connect to db
      require('db.php');

      // set up the SQL command
      $sql = "DELETE FROM employees WHERE employee_id = :employee_id";

      // create a command object so we can populate the movie_id value, the run the deletion
      $cmd = $conn->prepare($sql);
      $cmd->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
      $cmd->execute();

      //disconnect
      $conn = null;
    }
    catch (Exception $e) {
      mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
      header('location:error.php');
    }
    header('location:display-employee.php');
    //footer
    required_once('footer.php');
    ob_flush();
?>

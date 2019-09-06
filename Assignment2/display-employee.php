<h1>Employee Listings</h1>
<?php ob_start();
    //authentication check
    require_once('authentication.php');
    //set the page title
    $page_title = null;
    $page_title = 'Employee Listings';
    //embed the header
    require_once('header.php');
    $department = $_GET['department'];
    try{
      //connect to the database
      require('db.php');
      //prepare the query
      $sql = "SELECT * FROM employees WHERE department=:department";
      //run the query and store the results
      $cmd = $conn ->prepare($sql);

      $cmd ->bindParam(':department',$department, PDO::PARAM_STR, 50);
      $cmd ->execute();
      $employees = $cmd ->fetchAll();

      //start our grid
      echo '<div class="col-sm-6">
          <a href="employee.php" title="Add Employee">Add a New Employee</a>
      </div>
      <table class="table table-striped table-hover"><thread><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Birth Place</th><th>Department</th><th>Edit</th><th>Delete</th></thread><tbody>';
      //loop through the data and display results
      foreach ($employees as $employee) {
        // code...
        echo '<tr><td>' . $employee['employee_id'] .'</td>
                  <td>' . $employee['firstname'] .'</td>
                  <td>' . $employee['lastname'] .'</td>
                  <td>' . $employee['position'] .'</td>
                  <td>' . $employee['birthplace'] .'</td>
                  <td>' . $employee['department'] .'</td>
                  <td><a href="employee.php?employee_id='.$employee['employee_id'].'">Edit</a>'.'</td>
                  <td><a href="delete-employee.php?employee_id='.$employee['employee_id'].'" onclick="return confirm(\'Are you sure you want to delete this employee?\');">Delete</a></td></tr>';
      }
      //close the grid
      echo '</tbody></table>';
      //disconnect
      $conn = null;
    }
    catch (Exception $e) {
      mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
      header('location:error.php');
    }
    //embed footer
    require_once('footer.php');
    ob_flush();
 ?>

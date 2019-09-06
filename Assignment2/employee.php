<?php
    //authentication check
    require_once('authentication.php');
    //set the page title
    $page_title = null;
    $page_title = 'Employee Details';
    //embed the header
    require_once('header.php');
    //initialize variables
    $employee_id= '';
    $firstname='';
    $lastname='';
    $position='';
    $birthplace = '';
    $department='';
    $photo = '';

      // check the url for a movie_id parameter and store the value in a variable if we find one
      if (empty($_GET['employee_id']) == false) {
      $employee_id = $_GET['employee_id'];

      try{
        // connect to the database
        require('db.php');
        
        // write the sql query
        $sql = "SELECT * FROM employees WHERE employee_id = :employee_id";

        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
        $cmd->execute();
        $employee = $cmd->fetch();

        // populate the fields for the selected employee from the query result
        $firstname= $employee['firstname'];
        $lastname= $employee['lastname'];
        $position= $employee['position'];
        $birthplace = $employee['birthplace'];
        $department= $employee['department'];
        $photo = $employee['photo'];

        // disconnect
        $conn = null;
      }
      catch (Exception $e) {
        mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
        header('location:error.php');
      }
    }
 ?>
  <div class="container">
  <h1>Employee Details</h1>
  <form action="save-employee.php" method="post">
    <fieldset class="form-group">
      <label for="firstname" class="col-sm-2">First Name: </label>
      <input name="firstname" id="firstname" required value="<?php echo $firstname; ?>">
    </fieldset>
    <fieldset class="form-group">
      <label for="lastname" class="col-sm-2">Last Name: </label>
      <input name="lastname" id="lastname" required value="<?php echo $lastname; ?>">
    </fieldset>
    <fieldset class="form-group">
      <label for="position" class="col-sm-2">Position: </label>
      <select id="position" name="position" required value="<?php echo $position; ?>">
        <?php
          //get the position and fill the dropdown list
          //connect to the db
          require('db.php');
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
      <input name="birthplace" id="birthplace" required value="<?php echo $birthplace; ?>">
    </fieldset>
    <fieldset class="form-group">
       <label for="department" class="col-sm-2">Department:</label>
       <input name="department" id="department" required value="<?php echo $department; ?>" />
     </fieldset>
     <fieldset class="form-group">
        <label for="photo" class="col-sm-2">Photo:</label>
        <input name="photo" id="photo" required type="file"/>
    </fieldset>
    <?php if (!empty($photo)) { ?>
      <div class="col-sm-offset-2">
        <img src="images/<?php echo $photo; ?>" alt="Profile Picture"/>
      </div>
    <?php } ?>

    <input name="employee_id" type="hidden" value="<?php echo $employee_id; ?>" />
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
<?php
    //embed footer
      require_once('footer.php');
?>

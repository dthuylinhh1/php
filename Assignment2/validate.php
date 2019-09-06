<?php ob_start();

// store the inputs & hash the password
$username = $_POST['username'];
$password = $_POST['password'];

try{
  // connect to the database
  require('db.php');

  // write the query
  $sql = "SELECT * FROM users WHERE username = :username";

  // create the command, run the query and store the result
  $cmd = $conn->prepare($sql);
  $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
  $cmd->execute();
  $user = $cmd->fetch();

  // if count is 1, we found a matching username in the database.  Now check the password

  session_start();

  if (password_verify($password, $user['password'])) {
      // user found
      $_SESSION['user_id'] = $user['user_id'];
      header('location:display-employee.php');
  }
  else {
      // user not found
      header('location:login.php?invalid=true');
      exit();
  }



  $conn = null;
}
catch (Exception $e) {
  mail('linhtdao12@gmail.com', 'Assignment2 Web App Error', $e);
  header('location:error.php');
}


ob_flush(); ?>

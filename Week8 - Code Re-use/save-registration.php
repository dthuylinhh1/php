
    <?php ob_start();
    $page_title = null;
    $page_title = 'Saving your Registration...';
    require_once('header.php');
    //get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;

    //validate the inputs
    if(empty($username)){
      echo 'Email is required<br />';
      $ok = false;
    }

    if(empty($password)){
      echo 'Password is required<br />';
      $ok = false;
    }

    if($password != $confirm){
      echo 'Passwords do not match<br />';
      $ok = false;
    }

    if($ok){

    //hash the Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //connect to the database
    require('db.php');
    //set up and execute the insert

    $sql = "INSERT INTO users(username, password) VALUES (:username, :password)";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50
  );
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();

    // disconnect
    $conn = null;

    //show a message to the user

    echo 'Registration Saved';
  }
    required_once('footer.php');
    ob_flush();
     ?>

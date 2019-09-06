<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saving your Registration...</title>
  </head>
  <body>
    <?php
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
    //set up and execute the insert
    $conn = new PDO('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');$sql = "INSERT INTO users(username, password) VALUES (:username, :password)";
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
     ?>
  </body>
</html>

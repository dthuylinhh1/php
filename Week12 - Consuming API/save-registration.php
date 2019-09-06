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

//set up values checking Recapcha
  $secret = "6Ldw4rIUAAAAAITmfjZih4Tgey7PRti94Kc7-mB9";
  $response = $_POST['g-recaptcha-response'];

  //set up url request
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);

  //create an array to hold the values we want to post to google
  $post_data = array();
  $post_data['secret'] = $secret;
  $post_data['response'] = $response;
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

  //execute the curl request
  $result = curl_exec($ch);
  curl_close($ch);

  //convert the response to JSON object to an array so we can read it
  $result_array = json_decode($result, true);

  //check if the success value array is true or false
  if($result_array['success']==false){
    echo 'Are you human?';
    $ok = false;
  }

//proceed if the inputs are complete
  if($ok){

    //hash the Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    try{
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
    }
    catch (Exception $e) {
      mail('linhtdao12@gmail.com', 'COMP1006 Web App Error', $e);
      header('location:error.php');
    }
    //show a message to the user

    echo 'Registration Saved';

  }
  required_once('footer.php');
  ob_flush();
?>

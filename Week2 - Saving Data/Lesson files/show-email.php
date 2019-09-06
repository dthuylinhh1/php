<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Showing your email</title>
  </head>
  <body>
  <?php
  //Create and fill a local variable from the form input
  $email = $_POST['email'];

  //display a message that includes the email address entered on the last page
  echo 'Your email is: ' . $email;

  //show a message using double quotes instead
  echo "Your email is: $email";
   ?>
  </body>
</html>

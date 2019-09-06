<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your email</title>
  </head>
  <body>

    <?php
// get the email address entered in the form
$email = $_POST['email'];

// send a test message to this email
mail($email, 'PHP Email Test', 'Sending email from a PHP page');

echo 'Email Sent';
?>
  </body>
</html>

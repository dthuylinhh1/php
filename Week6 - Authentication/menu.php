<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <!-- css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  </head>
  <body>

    <?php

    // access the current session

    session_start();

    // check if there is a user identity stored in the session objectif
    if(empty($_SESSION['user_id'])) {
      // if there is no user_id in the session, redirect the user to the login page
      header('location:login.php');
      exit();
    }

    ?>
    <main class="container">

   <h1>COMP1006 Application</h1>

   <a href="books.php" title="Books">Books</a>

  </main>


    <!--js-->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

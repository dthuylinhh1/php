<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=514697559302444&autoLogAppEvents=1"></script>
  </head>
  <body>
    <?php
      //get the town name and fill the nav bar
      require_once('db.php');
      $sql = "SELECT DISTINCT department FROM employees ORDER BY department";
      $cmd = $conn ->prepare($sql);
      $cmd -> execute();
      $department = $cmd->fetchAll();
    ?>
    <nav class="navbar">
      <a href="homepage.php" title="The Alpha Consulting" class="navbar-brand">The Alpha Consulting Co.</a>
      <ul class="nav navbar-nav">
        <?php //show public or private links depending on whether the user has been authenticated
        if(!empty($_SESSION['user_id'])){ ?>
          <?php foreach ($department as $department): ?>
          <li><a href="display-employee.php?department=<?php echo $department['department']; ?>" title="department"><?php echo $department['department']; ?></a></li>
          <?php endforeach; ?>
          <li><a href="logout.php" title="Logout">Logout</a></li>
          <?php
        }
        else
        { ?>
          <li><a href="register.php" title="Regiser">Register</a></li>
          <li><a href="login.php" title="Login">Login</a></li>
        <?php } ?>
      </ul>
    </nav>


  <!-- page content starts here-->

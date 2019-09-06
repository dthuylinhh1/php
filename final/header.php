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
        $sql = "SELECT DISTINCT town FROM hotel ORDER BY town";
        $cmd = $conn ->prepare($sql);
        $cmd -> execute();
        $town = $cmd->fetchAll();
      ?>
      <nav class="navbar">
        <a href="default.php" title="The Maui Hotel" class="navbar-brand">The Maui Hotel Finder</a>
        <ul class="nav navbar-nav">
            <?php foreach ($town as $town): ?>
            <li><a href="hotels.php?town=<?php echo $town['town']; ?>" title="Towns"><?php echo $town['town']; ?></a></li>
          <?php endforeach; ?>
            <li><a href="api.php" title="Api">Api</a></li>
        </ul>
      </nav>


  <!-- page content starts here-->

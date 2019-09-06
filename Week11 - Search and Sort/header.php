<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    
  </head>
  <body>

    <nav class="navbar">
      <a href="menu.php" title="COMP1006 Web Application" class="navbar-brand">COMP 1006 App</a>
      <ul class="nav navbar-nav">
        <?php //show public or private links depending on whether the user has been authenticated
        if(!empty($_SESSION['user_id'])){ ?>
            <li><a href="movies.php" title="Movies">Movies</a></li>
            <li><a href="gallery.php" title="Gallery">Gallery</a></li>
            <li><a href="books.php" title="Books">Books</a></li>
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

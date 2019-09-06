<?php ob_start();

  $page_title = null;
  $page_title = 'Home Page';
  //embed the header
  require_once('header.php');

?>
<main class="container">

<h1>Welcome to the Alpha Consulting Co.!!!!</h1>

<h2>Click one of the departments above to find employee information that you need!</h2>


</main>


<?php
//embed footer
require_once('footer.php');
ob_flush();
 ?>

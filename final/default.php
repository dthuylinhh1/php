<?php ob_start();

  $page_title = null;
  $page_title = 'Default Page';
  //embed the header
  require_once('header.php');

?>
<main class="container">

<h1>Welcome to the Maui Hotel Finder!!!!</h1>

<h2>Click one of the towns above to find a Hotel near you</h2>


</main>


<?php
//embed footer
require_once('footer.php');
ob_flush();
 ?>

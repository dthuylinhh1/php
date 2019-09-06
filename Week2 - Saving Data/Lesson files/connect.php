<!DOCTYPE html>
<html>
  <head>
    <title>Database Connection</title>
  </head>
  <body>
    <?php
      $conn = null;
      $conn = new PDO ('mysql:host=aws.computerstudi.es/~gcc200385751;dbname=gcc200385751', 'gcc200385751','H_p8ZQQuqa');
      if(!$conn){
        die('Could not connect:');
      }else{
          echo 'Connected to the database';
      }

    ?>
  </body>

</html>

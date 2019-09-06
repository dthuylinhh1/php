<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select a Network</title>
    <!---css--->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  </head>
  <body>
    <h1>Select a Network</h1>
    <form method="post" action="shows.php">
      <fieldset>
        <label for="network_name">Network Name: </label>
        <select id="network_name" name="network_name">
          <?php
            //get the network name and fill the dropdown list

            $conn = new PDO ('mysql:host=52.60.209.3;dbname=gcc200385751','gcc200385751','H_p8ZQQuqa');
            $sql = "SELECT DISTINCT network_name FROM shows ORDER BY network_name";
            $cmd = $conn ->prepare($sql);
            $cmd -> execute();
            $network = $cmd->fetchAll();
            //add each network name to the dropdown, wrapped in <option> tags
            foreach ($network as $network) {
              echo '<option>' . $network['network_name']. '</option>';
            }
            //disconnect
            $conn = null;
           ?>
        </select>
        <button class="btn btn-primary">Get Shows</button>
      </fieldset>

    </form>
    <!---js--->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php ob_start();
  //set the page title
  $page_title = null;
  $page_title = 'Edit Hotel Information';
  //embed the header
  require_once('header.php');

  //initialize variables
    $hotelId= '';
    $name='';
    $address='';
    $town='';
    $photo='';
    $rating='';

    if (empty($_GET['hotelId']) == false) {
    $hotelId = $_GET['hotelId'];
    // connect to the database
    require('db.php');
    // write the sql query
    $sql = "SELECT * FROM hotel WHERE hotelId = :hotelId";

    // execute the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
    $cmd->execute();
    $hotel = $cmd->fetch();

    // populate the fields for the selected movie from the query result
    $name = $hotel['name'];
    $address = $hotel['address'];
    $town = $hotel['town'];
    $photo = $hotel['photo'];
    $rating = $hotel['rating'];


    // disconnect
    $conn = null;

    }
?>
  <div class="container">
  <h1>Hotel Details</h1>
  <form action="save-hotel.php" method="post" enctype="multipart/form-data">
    <fieldset class="form-group">
                <label for="name" class="col-sm-2">Name:</label>
                <input name="name" id="name" required value="<?php echo $name; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="address" class="col-sm-2">Address:</label>
                <input name="address" id="address" required type="address" value="<?php echo $address; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="town" class="col-sm-2">Town:</label>
                <input name="town" id="town" required type="town" value="<?php echo $town; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="photo" class="col-sm-2">Photo:</label>
                <input name="photo" id="photo" required type="file" value="<?php echo $photo; ?>" />
            </fieldset>
            <fieldset class="form-group">
               <label for="rating" class="col-sm-2">Rating:</label>
               <input name="rating" id="rating" required type="rating" value="<?php echo $rating; ?>"/>
           </fieldset>
             <div class="col-sm-offset-2">
               <img src="images/<?php echo $photo; ?>" alt="Hotel Poster"/>
             </div>


             <input name="hotelId" type="hidden" value="<?php echo $hotelId; ?>" />
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
<?php
  //embed footer
    require_once('footer.php');
    ob_flush();
?>

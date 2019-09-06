<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your movie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

  </head>
  <body>
  <div class="container">
  <h1>Movie Details</h1>
  <form action="save-movie.php" method="post">
    <fieldset class="form-group">
      <label for="title" class="col-sm-2">Enter movie title: </label>
      <input name="title" id="title" required>
    </fieldset>
    <fieldset class="form-group">
      <label for="year" class="col-sm-2">Enter movie year: </label>
      <input name="year" id="year" required type="number">
    </fieldset>
    <fieldset class="form-group">
      <label for="length" class="col-sm-2">Enter movie length: </label>
      <input name="length" id="length" required type="number">
    </fieldset>
    <fieldset class="form-group">
      <label for="url" class="col-sm-2">Enter movie url: </label>
      <input name="url" id="url" required type="url">
    </fieldset>
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>

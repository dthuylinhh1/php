<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your book</title>
    <!--- Link to the Bootstrap css--->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  </head>
  <body>
  <div class="container">
  <h1>Book Details</h1>
  <form action="save-book.php" method="post">
    <fieldset class="form-group">
      <label for="title" class="col-sm-2">Enter book title: </label>
      <input name="title" id="title" required>
    </fieldset>
    <fieldset class="form-group">
      <label for="author" class="col-sm-2">Enter book author: </label>
      <input name="author" id="author" required>
    </fieldset>
    <fieldset class="form-group">
      <label for="year" class="col-sm-2">Enter book year: </label>
      <input name="year" id="year" required type="number">
    </fieldset>
    <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
  </form>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>

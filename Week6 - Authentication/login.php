<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <!-- css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  </head>
  <body>
    <h1>Login</h1>
    <form action="validate.php" method="post">
      <fieldset class="form-group">
        <label for="username" class="col-sm-2">Username: </label>
        <input name="username" id="username" required />
      </fieldset>
      <fieldset class="form-group">
        <label for="password" class="col-sm-2">Password:</label>
        <input type="password" name="password" id="password" required/>
      </fieldset>
      <button class="btn btn-success col-sm-offset-2">Login</button>
    </form>

    <!--js-->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

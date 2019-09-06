<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <!-- css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  </head>
  <body>
    <h1>User Registration</h1>
    <form action="save-registration.php" method="post">
      <fieldset class="form-group">
        <label for="username" class="col-sm-2">Email:*</label>
        <input id='username' name="username" type="email" required/>
      </fieldset>
      <fieldset class="form-group">
        <label for="password" class="col-sm-2">Password:*</label>
        <input name="password" id="password" required type="password"/>
      </fieldset>
      <fieldset class="form-group">
        <label for="confirm" class="col-sm-2">Confirm Password:*</label>
        <input type="password" name="confirm" id="confirm" required/>
      </fieldset>
      <button class="btn btn-success col-sm-offset-2">Register</button>
    </form>
    <!--js-->
    <script src="js/bootstrap.min.js">

    </script>
  </body>
</html>

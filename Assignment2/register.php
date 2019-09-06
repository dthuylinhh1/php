<?php //embed header
$page_title = null;
$page_title = 'User Registration';
require_once('header.php');?>

<main class="container">
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
      <div class="g-recaptcha" data-sitekey="6Lf84rIUAAAAAAEfjTUGQHo4shgl-W_aKogOWC9p"></div>
      <button class="btn btn-success col-sm-offset-2">Register</button>
    </form>
</main>
<?php //embed footer
  require_once('footer.php');?>

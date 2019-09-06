<?php //embed header
  $page_title = null;
  $page_title = 'Login';
  require_once('header.php');?>
  <main class="container">
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
</main>

<?php //embed footer
  require_once('footer.php');?>

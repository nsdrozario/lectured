<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Login</title>
  </head>
  <body>
    <div class='center-page'>
      <p>Login</p><br/><br/>
      <form action='login_auth.php'>
        <p><label for='username'>Username:</label> <input name='username' type='text' id='username' /></p><br/>
        <p><label for='password'>Password:</label> <input name='password' type='text' id='password' /></p><br/><br/>
        <input type='submit' value='Submit' id='submit' />
      </form>
    </div>
  </body>
</html>

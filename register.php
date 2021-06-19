<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>InspirEd - Create an Account</title>
  </head>
  <body>
    <div class='center-page'>
      <p>Create an Account</p><br/><br/>
      <form action='login_auth.php'>
        <p><span>Username:</span> <input name='newUsername' type='text' id='newUsername' /></p><br/>
        <p><span>Password:</span> <input name='newPassword' type='password' id='newPassword' /></p><br/>
        <p><span>Confirm Password:</span>&nbsp; <input name='newPassword' type='password' id='newPassword' /></p><br/><br/>
        <input type='submit' value='Submit' id='submit' />
      </form>
    </div>
  </body>
</html>

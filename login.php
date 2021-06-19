<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>InspirEd - Login</title>
  </head>
  <body>
    <div class='center-page'>
      <p>Login</p><br/><br/>
      <form action='login_auth.php' method='post'>
        <p>Username:&nbsp; <input name='username' type='text' id='username' /></p><br/>
        <p>Password: <input name='password' type='password' id='password' /></p><br/><br/>
        <input type='submit' value='Submit' id='submit' />
      </form>
      <br/>
      <span style="color: red;" id="err-msg"></span>
      <script>

        let p = new URLSearchParams(window.location.search);
        if (p.has('err')) {
            switch(p.get("err")) {
                case "wrongcredentials":
                    document.querySelector("#err-msg").innerHTML = "Incorrect username or password, please try again.";
                break;
                case "nocredentials":
                    document.querySelector("#err-msg").innerHTML = "Please enter both a username and password.";
                break;
            }
        }   
      </script>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Login - Lectured</title>
  </head>
  <body>
    <?php
    if(!(session_id() == '') || !(session_status() == PHP_SESSION_NONE)) {
      echo 'Login successful';
      header("Location: account.php");
    }
     ?>
    <div class='center-page'>
      <p class='titular'>Login</p><br/><br/>
      <form action='login_auth.php' method='post'>
        <p>Username:&nbsp; <input name='username' type='text' id='username' /></p><br/>
        <p>Password: <input name='password' type='password' id='password' /></p><br/><br/>
        <input type='submit' value='Submit' id='submit' />
      </form>
      <br/>
      <div>
        <p>Don't have an account? Create one <a class='override-a-tag' href="register.php">here.</a></p>
      </div>
      <span style="color: red;" id="err-msg">&#8204;</span>
      <span style="color: green;" id="normal-msg">&#8204;</span>
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
        if (p.has('created_account')) {
            if (p.get('created_account') == "true") {
                document.querySelector("#normal-msg").innerHTML = "Account creation successful! You can log in here.";
            }
        }
        }
      </script>
    </div>
  </body>
</html>

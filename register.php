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
      <p>Do not reuse passwords from other websites. Be sure to make your password between 8 to 40 characters long.</p>
      <form action='account_creation.php' method="post" onsubmit="validate()">
        <p><span>Username:</span> <input name='newUsername' type='text' id='newUsername' /></p><br/>
        <p><span>Password:</span> <input name='newPassword' type='password' id='newPassword' onchange="validate()" /></p><br/>
        <p><span>Confirm Password:</span>&nbsp; <input name="newPassword-confirm" type='password' id='newPassword-confirm' onchange="validate()" /></p>
        <p><span>
            I am a:
            <select name="account-type">
                <option value="student" selected>Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </span></p>
        <br/><br/>
        <input type='submit' value='Submit' id='submit' />
      </form>
      <div>
      <br/>
        <p>Already have an account? Log in <a href="login.php">here.</a></p>
      </div>
      <div id="err-msg" style="color: red;">&#8204;
      </div>
      <script>
        function validate() {
            let pass = document.querySelector("#newPassword").value;
            let confirmPass = document.querySelector("#newPassword-confirm").value;
            if (pass != confirmPass) {
                document.querySelector("#err-msg").innerText = "Your passwords must match.";
            } else {
                document.querySelector("#err-msg").innerText = "";
            }
            return pass == confirmPass;
        }
      </script>
    </div>
  </body>
</html>

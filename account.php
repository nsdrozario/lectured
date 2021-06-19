<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>InspirEd - Home</title>
  </head>
  <body>
    <div class='container home relative-top'>
      <div class='row'>
        <div class='col-md-9'>
          <p class='titular'>Classes</p><br/>
          <div class='classes'>
            <p class='name-of-class'>AP Physics 1</p>
            <p class='additional-links'>Assignments | Files</p>
          </div><br/>
          <div class='classes'>
            <p class='name-of-class'>AP English Language and Composition</p>
            <p class='additional-links'>Assignments | Files</p>
          </div><br/>
          <div class='classes'>
            <p class='name-of-class'>AP Calculus AB</p>
            <p class='additional-links'>Assignments | Files</p>
          </div><br/>
        </div>
        <div class='col-md-3'>
          <p class='titular'>To-Do</p><br/>
          <div class='assignments-list'>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>007AB</p>
              <p class='assignment-details'>AP Calculus AB</p>
              <p class='assignment-details'>Due: March 14</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
            <div class='assignments'>
              <span class='close-assignment'>×</span><br/>
              <p class='name-of-assignment'>Banneker Essay</p>
              <p class='assignment-details'>AP English Language and Composition</p>
              <p class='assignment-details'>Due: June 9th</p>
            </div><br/>
          </div>
        </div>
        <div class="col-md-12">
            <form>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>

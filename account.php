<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["id"]) && isset($_SESSION["account-type"])) {

require "include/account_data_setup.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Courses - InspirEd</title>
  </head>
  <body>
    <div class='container'><br/>
      <span style='color: white'>Welcome, <?php echo $_SESSION["username"]; ?> </span>
      <a href='logout.php'>
        <p class='button' style='float: right'>
          <span style='font-size: 1em' class='material-icons'>logout</span>&nbsp;Log Out
        </p>
      </a><br/>
    </div>
    <div class='container home relative-top'>
      <div class='row'>
        <div class='col-md-9'>
          <p class='titular'>Classes</p><br/>
          <a class='course-hover' href='course.php'>
            <div class='classes'>
              <p class='name-of-class'>AP Physics 1</p>
              <p class='additional-links'>Assignments | Files</p>
            </div>
          </a><br/>
          <a class='course-hover' href='course.php'>
            <div class='classes'>
              <p class='name-of-class'>AP English Language and Composition</p>
              <p class='additional-links'>Assignments | Files</p>
            </div>
          </a><br/>
          <a class='course-hover' href='course.php'>
            <div class='classes'>
              <p class='name-of-class'>AP Calculus AB</p>
              <p class='additional-links'>Assignments | Files</p>
            </div>
          </a><br/>
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
      </div><br/>
      <div class="col-md-12">
          <form>
            <p id='join-class'>Class Code: <input class='button' type='text' name='course-code' id='course-code' /><input id='course-join' name='course-join' type='button' value='Join Course' class='button' /></p>
            <?php
              if ($_SESSION["account-type"]==2) {
                  include "create_course.php";
              }
            ?>
          </form>
      </div>
    </div>
  </body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>

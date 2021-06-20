<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["id"]) && isset($_SESSION["account-type"])) {

require "include/util.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Courses - Lectured</title>
  </head>
  <body>
    <div class='container'><br/>
      <span style='color: white'>Welcome, <?php echo $_SESSION["username"]; ?>!</span>
      <a href='logout.php'>
        <p class='button' style='float: right'>
          <span style='font-size: 1em' class='material-icons'>logout</span>&nbsp;Log Out
        </p>
      </a><br/>
    </div>
    <div class='container home relative-top'>
      <div class='row'>
        <div class='col-md-12'>
          <p class='titular'>Courses</p><br/>
          <div id="class-list">
          <?php
            $connection2 = pg_connect(getenv("DATABASE_URL"));
            $result = pg_query_params($connection2, "select course_list from public.users where id=$1", array($_SESSION["id"]));
            $data = NULL;
            if ($result) {
                $data = pg_fetch_assoc($result);
            }
            $course_list = json_decode($data["course_list"]);
            foreach ($course_list as $course) {
                $course_name = pg_query_params($connection2, "select course_title from public.courses where id=$1", array($course));
                if ($course_name) {
                    $course_name_array = pg_fetch_assoc($course_name);
                    if (input_check($course_name_array["course_title"])) {
                        echo "<a class='course-hover' href='course.php?courseid=". $course .  "'><div class='classes'><p class='name-of-class'>" . $course_name_array["course_title"] .  "</p><p class='additional-links'>Lecture Notes</p></div></a><br/>";
                    }
                }
            }
          ?>
          </div>
        </div>
      </div><br/>
      <div class="col-md-12">
          <form>
            <p id='join-class'>Class Code: <input class='button' type='text' name='course-code' id='course-code' /><input id='course-join' name='course-join' type='button' value='Join Course' class='button' onclick="join()" /></p>
            <div id="join-response"></div>
            <?php
              if ($_SESSION["account-type"]==2) {
                  include "create_course.php";
              }
            ?>
          </form>
          <script>
                function join() {
                    let code = document.querySelector("#course-code").value; // unfortunately this needs to be pasted over and over because without async stuff the xhr object goes out of scope
                    let xhr = new XMLHttpRequest();
                    let responseArea = document.querySelector("#join-response");
                    xhr.onreadystatechange=function() {
                        if (xhr.readyState==4 && xhr.status == 200) {
                            responseArea.innerHTML = xhr.responseText;
                        }
                    }
                    if (code != "") {
                        xhr.open("POST", "join_course.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.send("courseId="+code);
                    }
                }
          </script>
      </div>
      <p>This project was created for High Tech Hacks 2021 by Team Hackathoff.</p>
    </div>
  </body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>

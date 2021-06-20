<?php
    session_start();
    require "include/util.php";
    if (!$_SESSION["id"]) {
        exit();
    }
    if (!input_check($_GET["courseid"])) {
        header("Location: account.php");
    } else { 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include 'head.php';
     ?>
    <title>Course - Lectured</title>
  </head>
  <body>
    <div class='container home relative-top'>
      <h1>
        <?php
            $c = pg_connect(getenv("DATABASE_URL"));
            $name = pg_query_params($c, "select course_title from public.courses where id=$1", array($_POST["courseid"]));
            if (pg_num_rows($name) > 0) {
                $name_arr = pg_fetch_assoc($name);
                $real_name = $name_arr["course_title"];
                if ($real_name != "") {
                    echo $real_name;
                }
            }
        ?>
      </h1>
      <div style='text-align: left'>
        <p class='titular'>Quizzes</p>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
        <div class='assignments' style='text-align: center'>
          <p class='name-of-class'>007AB</p>
        </div><br/>
      </div>
    </div>
  </body>
</html>
<?php
    }
?>
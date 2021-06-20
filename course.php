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
            $name = pg_query_params($c, "select course_title from public.courses where id=$1", array($_GET["courseid"]));
            if (pg_num_rows($name) > 0) {
                $name_arr = pg_fetch_assoc($name);
                $real_name = $name_arr["course_title"];
                if ($real_name != "") {
                    echo $real_name;
                }
            }
        ?>
      </h1><br/><br/>
      <div style='text-align: left'>
        <p class='titular'>Class Notes</p><br/>
        <p><b>Argument</b></p><br/>
        <p>In politics today, it's come down to just "crazed rhetoric." Argument, in its most classical term, is carefully moving from the claim to the conclusion in a clear and coherent manner.</p><br/><br/>
        <p><b>Claim of Value</b></p><br/>
        <p>Argues between the binary. Is it good or bad? Right or wrong? Usually based on taste but also based on world views at times.</p><br/><br/>
        <p><b>Counterargument Thesis</b></p><br/>
        <p>The counterclaim comes first in the argument essay thesis in this version. It's advantageous if you immediately want to address the counterargument.</p><br/><br/>
        <p><b>Deduction</b></p><br/>
        <p>Goes from a universal truth and boils down to a specific argument. Induction is the opposite</p><br/><br/>
      </div>
    </div>
  </body>
</html>
<?php
    }
?>

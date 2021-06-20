<?php

session_start();
if (!$_SESSION["id"]) {
    exit();
}
require "include/util.php";
if (input_check($_POST["courseName"])) {

    $connection = pg_connect(getenv("DATABASE_URL"));
    $result = pg_query_params($connection, "insert into public.courses (course_title, owner_id) values ($1, $2)", array($_POST["courseName"], $_SESSION["id"]));
    $result2 = pg_query_params($connection, "select id from public.courses where course_title=$1 and owner_id=$2;", array($_POST["courseName"], $_SESSION["id"]));
    if ($result != false) {
        $course_id = pg_fetch_assoc($result2);
        echo "<p style='color: green;'>Course creation successful!</p>" . 
             "<p>Course code: <b>". $course_id["id"] . "</b></p>";
    }

} else {
    echo "<p style='color: red;'>Please enter a non-empty course name.</p>";
}

?>
<?php

session_start();
if (!$_SESSION["id"]) {
    exit();
}
require "include/util.php";
if (input_check($_POST["courseId"])) {

    $connection = pg_connect(getenv("DATABASE_URL"));
    $result2 = pg_query_params($connection, "select * from public.courses where id=$1", array($_POST["courseId"]));
    if ($result2) {
        
        $course_id = pg_fetch_assoc($result2);
        $list_courses = pg_query_params($connection, "select course_list from public.users where id=$1", array($_SESSION["id"]));
        if ($list_courses) {
            $course_list_data = json_decode(pg_fetch_assoc($list_courses)["course_list"]);
            if ($course_list_data) {

            } else {
                $arr = array($_POST["courseId"]);
                $upload = json_encode($arr);
                pg_query_params($connection, "update public.users set course_list=$1 where id=$2 and username=$3", array($upload, $_SESSION["id"], $_SESSION['username']));
            }
        }

        echo '<p style="color: green;"> Successfuly registered into ' . $course_id["course_title"] . "! Please refresh to view course materials.</p>";

    }

} else {
    echo "<p style='color: red;'>Please enter a non-empty course name.</p>";
}

?>

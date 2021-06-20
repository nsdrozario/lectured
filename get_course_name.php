<?php

session_start();
if (!$_SESSION["id"]) {
    exit();
}
require "include/util.php";

$connection = pg_connect(getenv("DATABASE_URL"));
$result = pg_query_params($connection, "select course_title from public.courses where id=$1", array($_POST["courseId"]));
if ($result) {
    $data = pg_fetch_assoc($result2);
    echo $data["course_title"];
}

?>

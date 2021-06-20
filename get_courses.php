<?php

session_start();
if (!$_SESSION["id"]) {
    exit();
}
require "include/util.php";

$connection = pg_connect(getenv("DATABASE_URL"));
$result = pg_query_params($connection, "select course_list from public.users where id=$1", array($_SESSION["id"]));
if ($result) {
    $data = pg_fetch_assoc($result2);
    echo $data["course_list"];
}

?>

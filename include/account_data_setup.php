<?php

session_start();

if (!(isset($_SESSION["username"]) && isset($_SESSION["id"]) && isset($_SESSION["account-type"]))) {
    exit();
}


$file = file_get_contents("data/".$_SESSION["id"]."-courses.json");

if ($file == false) {
    fclose(fopen("data/".$_SESSION["id"]."-courses.json", "w"));
    $file="";
}

$course_data = json_decode($file, true);

?>
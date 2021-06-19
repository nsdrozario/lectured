<?php

/*
get user post data here from login form to authenticate
*/

require "include/user.php";

if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
    $connection = pg_connect(getenv("DATABASE_URL"));
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = pg_query_params($connection, "select * from public.users where username=$1", array($username));
    $serialized_result = pg_fetch_assoc($result);
    if (isset($serialized_result["password"]) && password_verify($password, $serialized_result["password"])) {
        // login successful

        session_start();
        
        $_SESSION["username"]=$serialized_result["username"];
        $_SESSION["id"]=$serialized_result["id"];

        echo 'Login successful';
        header("Location: landing.php");
    } else {
        echo "Incorrect username or password";
        header("Location: login.php?err=wrongcredentials");
    }

    pg_close($connection);
} else {
    echo "Access denied";
    header("Location: login.php?err=nocredentials");
}
?>

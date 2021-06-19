<?php

/*
get user post data here from login form to authenticate
*/

require "include/user.php";

if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
    $connection = pg_connect(getenv("DATABASE_URL"));
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = pg_query_params($connection, "select password from public.users where name=$1", array($username));
    $id = pg_query_params($connection,"select id from public.users where name=$1", array($username));
    if (password_verify($password, $result)) {
        // login successful
        
        session_start();
        
        $_SESSION["username"]=$username;
        $_SESSION["id"]=$id;

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

<?php

/*
    There are echo statements throughout the script so that people
    who disabled redirects will still have information
    about if anything goes wrong.
*/

require "include/user.php";
require "include/util.php";

if (input_check($_POST["newUsername"]) && input_check($_POST["newPassword"]) && input_check($_POST["newPassword-confirm"]) && input_check($_POST["account-type"])) {

    if ($_POST["newPassword"] != $_POST["newPassword-confirm"]) {
        // check to see if passwords match in case user is not running JavaScript
        echo "Please make sure that the passwords match.";
        header("Location: register.php?err=notmatch");
        pg_close($connection);
        exit();
    }
    if(strlen($_POST["newPassword"]) < 8) {
      echo "Password is too short.";
      header("Location: register.php?err=passtooshort");
      pg_close($connection);
      exit();
    }
    if(strlen($_POST["newPassword"]) > 40) {
      echo "Password is too long.";
      header("Location: register.php?err=passtoolong");
      pg_close($connection);
      exit();
    }

    $connection = pg_connect(getenv("DATABASE_URL"));
    $results = pg_query_params("select username from public.users where username=$1",array($_POST["newUsername"]));

    $type = 1;
    if ($_POST["account-type"] == "teacher") {
        $type = 2;
    }

    if (pg_num_rows($results) == 0) {

        $acc_creation_result = pg_query_params(
            $connection,
            "insert into public.users (username, password, usertype) values ($1, $2, $3)",
            array (
                $_POST["newUsername"],
                password_hash($_POST["newPassword"], PASSWORD_BCRYPT),
                $type
            )
        );

        if ($acc_creation_result == false) {
            echo "Account creation failed, please try again";
            pg_close($connection);
            header("Location: register.php?err=failed");
        } else {
            echo "Account creation successful";
            pg_close($connection);
            header("Location: login.php?created_account=true");
        }

    } else {

        echo "Username taken";
        header("Location: register.php?err=usernametaken");
        pg_close($connection);
        exit();

    }

    pg_close($connection);

} else {

    echo "Invalid input, make sure all fields are entered";
    header("Location: register.php?err=notfilled");

}
?>

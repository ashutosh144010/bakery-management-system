<?php
include "login.php";
include "connection.php";

session_start();

if (!isset($_SESSION['user']) or !isset($_SESSION['admin'])) {
    header("Location: user/login.php");
}

?>

<?php

include "connection.php";

session_start();
session_unset();
session_destroy();

header("Location: user/login.php");

?>
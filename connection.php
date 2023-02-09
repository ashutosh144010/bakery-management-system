<?php

// Defining constant php variable for local host

define('DB_host', 'localhost');    
define('DB_username', 'root');  // we are giving root as username
define('DB_password', '');  // we are giving default password
define('DB_name', 'sweetbakery');  //we are giving sweetbakery as database name
$conn = mysqli_connect(DB_host, DB_username, DB_password, DB_name);  // query for connection of database


if (!$conn) {
    die("connection failed" . mysqli_connect_error());  // if condition to show weather the connection is stablished or not
    echo "Connection Fail";
}


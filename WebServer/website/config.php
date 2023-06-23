<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'repte-db-1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'NUbcCkULmhs8CJDjNmxE');
define('DB_NAME', 'Repte');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}?>

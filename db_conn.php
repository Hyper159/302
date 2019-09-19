<?php
error_reporting(0);
//mysql connection (hostname, username, password, dbname);
$mysqli = new mysqli('localhost', 'root', '', 'lectureradmin');

//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
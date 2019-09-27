<?php
error_reporting(0);
//mysql connection (hostname, username, password, dbname);
$mysqli = new mysqli('localhost', 'root', '', 'lectureradmin');

//$mysqli = new mysqli('alacritas.cis.utas.edu.au', 'LecturerAdmin', 'Kyl0R3n!', 'LecturerAdmin');

//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
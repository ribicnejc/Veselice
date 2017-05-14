<?php
$servername = "localhost";
$user = "nejcribic_nejc";
$password = "*piF5(QE4xlKw";
$dbname = "nejcribic_test";
//$servername = "localhost";
//$user = "root";
//$password = "";
//$dbname = "nejcribic_test";
$con = new mysqli($servername, $user, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
mysqli_set_charset($con,"utf8");
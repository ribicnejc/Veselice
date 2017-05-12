<?php
$link = mysqli_connect('localhost', 'nejcribic_nejc', '', 'nejcribic_test');
mysqli_set_charset($link, 'utf8');
$table = "elements";

//TODO generate values in loop
$set = "fff";

$sql = "insert into `$table` set `$set`";


$result = mysqli_query($link, $sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

mysqli_close($link);
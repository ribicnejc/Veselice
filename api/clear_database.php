<?php
require ('database_connect.php');
$sql = "DELETE FROM elements";
if ($con->query($sql) === TRUE) {
    echo "Database cleared successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    http_response_code(404);
    die(mysqli_error($con));
}
$con->close();
<?php
include('simple_html_dom.php');
require ('database_connect.php');

$html = file_get_html('http://www.veselica.info/page/veselice-2017');
$CONST = array("Petek", "Sobota", "Nedelja", "Ponedeljek", "Torek", "Sreda", "Četrtek");
$perday = array();
$main = array();
$byDay = array();
foreach ($html->find('td#content') as $e) {
    foreach ($e->find('h2, a, img') as $elt) {
        $value = $elt->href;
        $tmp = $elt;
        $elt = strip_tags($elt, 'li');
        if ($elt != "") {
            $words = explode(", ", $elt);
            if (in_array($words[0], $CONST)) {
                if (sizeof($perday) > 0) {
                    $byDay["places"] = $perday;
                    array_push($main, $byDay);
                }
                $byDay = array();
                $perday = array();
                $byDay["date"] = $elt;
            } else {
                $t = null;
                $t["name"] = $elt;
                $t["href"] = $value;
                array_push($perday, $t);
            }
        }
    }
}

$table = "elements";
$sql = "INSERT INTO $table (date, name, href) VALUES ";
$second = "";
foreach ($main as $item){
    $date = $item["date"];
    $places = $item["places"];
    foreach ($places as $place){
        $name = $place["name"];
        $href = $place["href"];
        $second .= "('$date','$name','$href'),";
    }
}$sql = $sql.$second;
$sql = substr($sql, 0, -1);
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    http_response_code(404);
    die(mysqli_error($con));
}
$con->close();
<?php
include('simple_html_dom.php');
//error_reporting(0);
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
$json = json_encode($main, JSON_UNESCAPED_UNICODE);
echo $json;



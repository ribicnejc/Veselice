<?php
include('simple_html_dom.php');
$html = file_get_html('http://www.veselica.info/page/veselice-2017');
$CONST = array("Petek", "Sobota", "Nedelja", "Ponedeljek", "Torek", "Sreda", "Četrtek");
$tmp = "";
$ar = array();
foreach ($html->find('td#content') as $e) {

    foreach ($e->find('h2, a') as $elt) {

        $elt = strip_tags($elt, '');
        array_push($ar, $elt);

    }
}
$arr = array();
foreach ($ar as $elt){
    if($elt == "") continue;
    array_push($arr, $elt);
}

$perday = array();
$main = array();
//print_r($arr);
foreach ($arr as $elt){
    $words = explode(", ", $elt);
    if(in_array($words[0], $CONST)){
        if(sizeof($perday) > 0) array_push($main, $perday);
        array_push($main, $elt);
        $perday = array();
    }else{
        array_push($perday, $elt);
    }
}
//print_r($main);

$json = json_encode($main,JSON_UNESCAPED_UNICODE);
echo $json;





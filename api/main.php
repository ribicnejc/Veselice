<?php
include('simple_html_dom.php');
//error_reporting(0);

function getAll()
{
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

}

function getByPlace($place)
{
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
                    $place = strtolower($place);
                    $elt2 = strtolower($elt);
                    if (strpos($elt2, $place) !== false) {
                        $t["name"] = $elt;
                        $t["href"] = $value;
                        array_push($perday, $t);
                    }
                }
            }
        }
    }
    $json = json_encode($main, JSON_UNESCAPED_UNICODE);
    echo $json;
}


function getByDay($day)
{
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
    $byDayArray = array();
    foreach ($main as $item) {
        $words = explode(", ", $item["date"]);
        if (strtolower($words[0]) == strtolower($day)) {
            array_push($byDayArray, $item);
        }
    }
    $json = json_encode($byDayArray, JSON_UNESCAPED_UNICODE);
    echo $json;
}

function getByDate($date)
{
    $months = array("januar" => "1", "februar" => "2", "marec" => "3", "april" => "4",
        "maj" => "5", "junij" => "6", "julij" => "7", "avgust" => "8", "september" => "9",
        "oktober" => "10", "november" => "11", "december" => "12",);

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
    $byDayArray = array();
    foreach ($main as $item) {
        $words = explode(", ", $item["date"]);
        $words = explode(" ", $words[1]);
        $day1 = null;
        $month1 = null;
        $year1 = null;
        if($words[2] != "2017"){
            $day1 = $words[1];
            $month1 = $words[2];
            $year1 = $words[3];
        }else{
            $day1 = $words[0];
            $month1 = $words[1];
            $year1 = $words[2];
        }
        //http://localhost:63342/firstApi/api/myApi.php?getAll/date/2.6.2017
        $month1 = $months[$month1];
        $dateIs = $day1.$month1.".".$year1;
        if($dateIs == $date){
        array_push($byDayArray, $item);
        }
    }
    $json = json_encode($byDayArray, JSON_UNESCAPED_UNICODE);
    echo $json;
}
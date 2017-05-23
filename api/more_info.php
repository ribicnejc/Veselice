<?php
//include('simple_html_dom.php');
$url = "http://www.veselica.info";
function moreInfo($link)
{
    $url = "http://www.veselica.info";
    $url = $url . $link;
    //echo $url;
    $html = file_get_html($url);
    $title = "";
    $date = "";
    $actors = "";
    $place = "";
    $region = "";
    $about = "";
    foreach ($html->find('td#content') as $content) {
        foreach ($content->find('table tbody tr td h1') as $tit) {
            $title = $tit;
        }
        $i = 0;
        foreach ($content->find('div h2.big') as $elt) {
            if ($i == 0) {
                $date = $elt;
            } else {
                $place = $elt;
            }
            $i++;
        }
        foreach ($content->find('div p span.big') as $actor) {
            $actors = $actor;
        }
        foreach ($content->find('div aside') as $regions) {
            $region = $regions;
        }
        $i = 0;
        foreach ($content->find('div p ') as $abouts) {
            if ($i == 3) {
                $about = $abouts;
            }
            $i++;
        }
    }
    $title = strip_tags($title, 'h1');
    $date = strip_tags($date, 'span');
    $actors = strip_tags($actors, 'span');
    $place = strip_tags($place, 'h2');
    $region = strip_tags($region, 'aside');
    $about = strip_tags($about, 'p');
    $tmp["title"] = $title;
    $tmp["date"] = $date;
    $tmp["actors"] = $actors;
    $tmp["location"] = $place;
    $tmp["region"] = $region;
    $tmp["about"] = $about;
    $tmp = (object)$tmp;
    echo json_encode($tmp, JSON_UNESCAPED_UNICODE);
}

//$link = "/page/veselice-2017?Jezica_Ljubljana-Skupina_Gadi;block_id=4797;subcmd=view_event;event_id=3787";

/*
foreach ($html->find('td#content') as $e) {
    foreach ($e->find('h2, a, img') as $elt) {
        $value = $elt->href;
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
                $href_id = explode("event_id=", $value);
                if ($value[0] == "#")  continue;
                $t["href"] = $value;
                $t["id"] = $href_id[1];
                array_push($perday, $t);
            }
        }
    }
}
return $main;*/
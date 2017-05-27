<?php

//include('simple_html_dom.php');
$url = "http://www.veselica.info";
function moreInfo($link)
{
    $url = "http://www.veselica.info";
    $url = $url . $link;
    $html = file_get_html($url);
    $title = "";
    $date = "";
    $actors = "";
    $place = "";
    $region = "";
    $about = "";
    $videos = array();
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
        foreach ($content->find('iframe') as $video) {
            $href = $video->src;
            if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $href, $id)) {
                $url2 = "http://www.youtube.com/watch?v=" . $id[1];
                $youtube = "http://www.youtube.com/oembed?url=" . $url2 . "&format=json";
                $curl = curl_init($youtube);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $return = curl_exec($curl);
                curl_close($curl);
                $array = json_decode($return,TRUE);
                $array["html"] = "";
                array_push($videos, $array);
            } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $href, $id)) {
                $url2 = "http://www.youtube.com/watch?v=" . $id[1];
                $youtube = "http://www.youtube.com/oembed?url=" . $url2 . "&format=json";
                $curl = curl_init($youtube);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $return = curl_exec($curl);
                curl_close($curl);
                $array = json_decode($return,TRUE);
                $array["html"] = "";
                array_push($videos, $array);
            } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $href, $id)) {

                $url2 = "http://www.youtube.com/watch?v=" . $id[1];
                $youtube = "http://www.youtube.com/oembed?url=" . $url2 . "&format=json";
                $curl = curl_init($youtube);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $return = curl_exec($curl);
                curl_close($curl);
                $array = json_decode($return,TRUE);
                $array["html"] = "";
                array_push($videos, $array);
            } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $href, $id)) {
                $url2 = "http://www.youtube.com/watch?v=" . $id[1];
                $youtube = "http://www.youtube.com/oembed?url=" . $url2 . "&format=json";
                $curl = curl_init($youtube);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $return = curl_exec($curl);
                curl_close($curl);
                $array = json_decode($return,TRUE);
                $array["html"] = "";
                array_push($videos, $array);
            } else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $href, $id)) {
                $url2 = "http://www.youtube.com/watch?v=" . $id[1];
                $youtube = "http://www.youtube.com/oembed?url=" . $url2 . "&format=json";
                $curl = curl_init($youtube);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $return = curl_exec($curl);
                curl_close($curl);
                $array = json_decode($return,TRUE);
                $array["html"] = "";
                array_push($videos, $array);
            }
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
    $tmp["videos"] = $videos;
    $tmp = (object)$tmp;

    //var_dump(http_response_code(200));
    echo json_encode($tmp, JSON_UNESCAPED_UNICODE);
}
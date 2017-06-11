<?php
include ('main.php');
include ('more_info.php');
$method = $_SERVER['REQUEST_METHOD'];
$parts = explode('&', $_SERVER['QUERY_STRING']);

$request = explode('/', trim($parts[0],'/'));
$appKey = "appid=b587472c-5fe5-4a16-83ae-626aa4aad33e";
if (sizeof($parts) != 2){
    exit(400);
}
if ($parts[1] != $appKey) {
    exit(403);
}

$all = array_shift($request);
$specific = array_shift($request);
$key = array_shift($request);

if($all == "getAll"){
    switch ($specific){
        case "place":
            getByPlace($key);
            break;
        case "day":
            getByDay($key);
            break;
        case "date":
            getByDate($key);
            break;
        default:
            getAll();
            break;
    }
}else if($all == "moreInfo"){
    $link = '/'.$specific .'/'. $key;
    moreInfo($link);
}
//http://gardenestudio.com.br/index.php
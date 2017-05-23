<?php
include ('main.php');
include ('more_info.php');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['QUERY_STRING'],'/'));

//Todo show errors
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
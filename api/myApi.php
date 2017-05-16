<?php
include ('main.php');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['QUERY_STRING'],'/'));
//TODO fix api to show name, place
//Todo show errors
//todo
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
}
//http://gardenestudio.com.br/index.php
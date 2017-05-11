<?php
/**
 * Created by PhpStorm.
 * User: Nejc
 * Date: 11. 05. 2017
 * Time: 08:36
 */
include ('main.php');
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['QUERY_STRING'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);
//print_r($request);

$all = array_shift($request);
$specific = array_shift($request);
$key = array_shift($request);

//echo "first: ".$all."\n";
//echo "second: ".$specific."\n";
//echo "third: ".$key."\n";

if($all == "getAll"){
    switch ($specific){
        case "place":
            break;
        case "day":
            break;
        case "date":
            break;
        default:
            getAll();
            break;
    }
}
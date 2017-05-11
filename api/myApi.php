<?php
/**
 * Created by PhpStorm.
 * User: Nejc
 * Date: 11. 05. 2017
 * Time: 08:36
 */

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['QUERY_STRING'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
print_r($request);

$all = array_shift($request);

print_r(array_shift($request));
print_r(array_shift($request));

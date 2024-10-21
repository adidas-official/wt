<?php

header('Access-Control-Allow-Origin: http://localhost:8091');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// initiate database connection
$database = new Database();
$db = $database->getConnection();

// initiate product object
$product = new Product($db);

// get data
$product->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($product->id != null) {

    if ($product->delete()) {
        http_response_code(200);
        echo json_encode(array("message" => "Item deleted"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Service unavailable"));
    }


} else {
    http_response_code(400);
    echo json_encode(array("message" => "Missing parameter: id"));
}
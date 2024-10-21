<?php 
// required headers
header('Access-Control-Allow-Origin: http://localhost:8091');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// print_r($data);

if (!empty($data->name) &&
    !empty($data->description) &&
    !empty($data->price) 
) {
    $product->name = $data->name;
    $product->description = $data->description;
    $product->price = $data->price; 

    if ($product->create()) {
        // set response code to 201
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Product was created"));
    // if unable to create the product, tell the user
    } else {
        // 503 - service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create product"));
    }

} else {
    // data incomplete
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Data incomplete"));
}




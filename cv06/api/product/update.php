<?php 

header('Access-Control-Allow-Origin: http://localhost:8091');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
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
$data = json_decode(file_get_contents('php://input'));

if (!empty($data->id)) {

    $product->id = $data->id;
    // get current data
    $product->readOne();
    $current_data = [
        'name' => $product->name,
        'description' => $product->description,
        'price' => $product->price,
    ];

    // change only the data that is different
    if ($data->name == null) {
        $data->name = $current_data['name'];
    }
    if ($data->description == null) {
        $data->description = $current_data['description'];
    }
    if ($data->price == null) {
        $data->price = $current_data['price'];
    }

    $product->name = $data->name;
    $product->description = $data->description;
    $product->price = $data->price;

    if ($product->update()) {
        http_response_code(200);
        echo json_encode(array("message" => "Item updated"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Service unavailable"));
    }


} else {
    http_response_code(400);
    echo json_encode(array("message" => "Missing parameter: id"));
}


<?php 

// required headers, don't allow ACAO for everything, only allow for localhost:8091
header('Access-Control-Allow-Origin: http://localhost:8091');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate database and object
$database = new Database();
$db = $database->getConnection();


$product = new Product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
$product->readOne();

if ($product->name != null) {
    // create array
    $product_arr = [
        'id' => $product->id,
        'name' => $product->name,
        'description' => $product->description,
        'price' => $product->price,
    ];

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($product_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(['message' => 'Product does not exist']);
}

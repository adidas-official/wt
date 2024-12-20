<?php 

// required headers, don't allow ACAO for everything, only allow for localhost:8091
header('Access-Control-Allow-Origin: http://localhost:8091');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate database and object
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$stmt = $product->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // products array
    $products_arr = [];
    $products_arr['records'] = [];

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);

        $product_item = [
            'id' => $id,
            'name' => $name,
            'description' => html_entity_decode($description),
            'price' => $price,
        ];

        array_push($products_arr['records'], $product_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($products_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(['message' => 'No products found']);
}
<?php 
require_once 'db.php';

$name = filter_input(INPUT_GET, "term", FILTER_UNSAFE_RAW);

try {

    $query = "SELECT `name` FROM `names` WHERE `name` LIKE :term";
    $n = "%$name%";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":term", $n, PDO::PARAM_STR);
    $stmt->execute();

    $names = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($names);


} catch (Exception $e) {
    echo $e->getMessage();
}

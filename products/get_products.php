<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include '../db.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);

$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
echo json_encode($products);
?>

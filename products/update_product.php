<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$query = "UPDATE products SET name='$name', price='$price', stock='$stock' WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    echo json_encode(["message" => "Product updated successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
?>

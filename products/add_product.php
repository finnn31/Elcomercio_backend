<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include '../db.php';

$id = $_POST['id']; // Menggunakan id manual
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$query = "INSERT INTO products (id, name, price, stock) VALUES ('$id', '$name', '$price', '$stock')";
if ($conn->query($query) === TRUE) {
    echo json_encode(["message" => "Product added successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
?>

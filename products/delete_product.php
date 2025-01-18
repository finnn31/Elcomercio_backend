<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include '../db.php';

$id = $_POST['id'];

$query = "DELETE FROM products WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    echo json_encode(["message" => "Product deleted successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
?>

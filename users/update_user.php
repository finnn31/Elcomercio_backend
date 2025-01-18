<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($id) || empty($name) || empty($email)) {
    echo json_encode(['success' => false, 'message' => 'ID, name, and email are required']);
    exit();
}

$query = empty($password) 
    ? "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'" 
    : "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";

if ($conn->query($query) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'User updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update user']);
}
?>

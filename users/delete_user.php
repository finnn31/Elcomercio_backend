<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include '../db.php';

$id = $_POST['id'];

if (empty($id)) {
    echo json_encode(['success' => false, 'message' => 'User ID is required']);
    exit();
}

$query = "DELETE FROM users WHERE id = '$id'";
if ($conn->query($query) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete user']);
}
?>

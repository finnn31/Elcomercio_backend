<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit();
}

$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($query) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Registration successful']);
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed: ' . $conn->error]);
}
?>

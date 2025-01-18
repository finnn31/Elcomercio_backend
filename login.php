<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include 'db.php'; // Pastikan jalur benar sesuai lokasi db.php

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : ''; // Role tambahan untuk membedakan pengguna

if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Database connection error']));
}

if ($role === 'admin') {
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
} else {
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
}

$result = $conn->query($query);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Query error: ' . $conn->error]);
} else if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode(['success' => true, 'user' => $user, 'role' => $role]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
}
?>

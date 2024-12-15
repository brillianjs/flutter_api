<?php
header('Content-Type: application/json');
include('config.php');
require('vendor/autoload.php'); // Include Composer autoload

use Firebase\JWT\JWT;

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    // Validate $username and $password (sanitize inputs in a real-world scenario)

    $query = "SELECT * FROM users WHERE email = '$email' AND password = sha1('$password')";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Authentication successful
        $user = $result->fetch_assoc();

        // Generate a JWT token
        $key = "koderahasia"; // Replace with your secret key
        $token = JWT::encode(['user_id' => $user['id']], $key, 'HS256');

        $response = array('status' => 'success', 'message' => 'Login successful', 'token' => $token);
    } else {
        // Authentication failed
        $response = array('status' => 'error', 'message' => 'Invalid username or password');
    }
} else {
    // Invalid request
    $response = array('status' => 'error', 'message' => 'Invalid request');
}

echo json_encode($response);
$conn->close();
?>
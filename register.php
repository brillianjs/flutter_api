<?php
header('Content-Type: application/json');
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['email']) && isset($data['password'])) {
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];

    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        $response = array('status' => 'error', 'message' => 'Username already registered');
    } else {
        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', sha1('$password'))";
        if ($conn->query($insertQuery) === TRUE) {
            $response = array('status' => 'success', 'message' => 'Registration successful');
        } else {
            $response = array('status' => 'error', 'message' => 'Registration failed');
        }
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request');
}

echo json_encode($response);
$conn->close();
?>

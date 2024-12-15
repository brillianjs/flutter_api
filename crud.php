<?php
//
header('Content-Type: application/json');


include('config.php');
require('vendor/autoload.php'); 


use Firebase\JWT\JWT;


$data = json_decode(file_get_contents('php://input'), true);

// 
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $token = trim(str_replace('Bearer', '', $_SERVER['HTTP_AUTHORIZATION']));

    
    $key = "koderahasia";

    try {
        
        $decoded = JWT::decode($token, $key, array('HS256'));

        
        $user_id = $decoded->user_id;

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            if (isset($data['nama']) && isset($data['prodi'])) {
                $nama = $data['nama'];
                $prodi = $data['prodi'];

                
                
                $insertQuery = "INSERT INTO mahasiswa (nama, prodi) VALUES ('$nama', '$prodi')";

                
                if ($conn->query($insertQuery) === TRUE) {
                    
                    $response = array('status' => 'success', 'message' => 'Mahasiswa inserted successfully');
                } else {
                    
                    $response = array('status' => 'error', 'message' => 'Mahasiswa insertion failed');
                }
            } else {
                
                $response = array('status' => 'error', 'message' => 'Invalid request data');
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            

            $readQuery = "SELECT nama, prodi FROM mahasiswa";
            $result = $conn->query($readQuery);

            $users = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
                $response = array('status' => 'success', 'mahasiswa' => $users);
            } else {
                $response = array('status' => 'success', 'message' => 'No users found');
            }
        }
    } catch (Exception $e) {
        
        $response = array('status' => 'error', 'message' => 'Invalid token');
    }
} else {
    
    $response = array('status' => 'error', 'message' => 'Token not provided');
}


echo json_encode($response);


$conn->close();
?>

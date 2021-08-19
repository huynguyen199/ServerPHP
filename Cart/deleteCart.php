<?php
$servername = "localhost";
$username = "root";
$mpassword = "";
$dbname = "bookdb";

//reset and change password

// Create connection
$conn = new mysqli($servername, $username, $mpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET['id'];

    $sql = "DELETE FROM cart WHERE id='$id'";


    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
    } else {
        $response = array('status' => false, 'message' => 'failure');
    }

    echo json_encode($response);
}

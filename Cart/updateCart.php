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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $amount = $_POST['amount'];

    $sql = "UPDATE cart SET amount='$amount' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'message' => 'failure');
        echo json_encode($response);
    }
}

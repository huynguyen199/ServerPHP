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
    $email =  $_POST['email'];

    $sql = "SELECT * FROM user where email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // $row["email"]
            $response = array('email' =>  $row["email"], 'fullname' => $row["fullname"], 'status' => true, 'message' => true);
        }
    } else {
        $response = array('status' => false, 'message' => 'failure');
    }
    echo json_encode($response);
}

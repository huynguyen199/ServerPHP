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
    $email = $_POST['email'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

    $sql = "SELECT * FROM user WHERE email='$email' && password='$oldpassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE user SET password='$newpassword' where email = '$email'";
        if ($conn->query($sql) === TRUE) {
            $response = array('status' => true, 'message' => 'success');
        }
    } else {
        $response = array('status' => false, 'message' => 'failure');
    }

    echo json_encode($response);
}

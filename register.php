<?php
$servername = "localhost";
$username = "root";
$mpassword = "";
$dbname = "bookdb";



// Create connection
$conn = new mysqli($servername, $username, $mpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];



    $sql = ("SELECT count(*) as total from user where email = '$email'");
    $result = $conn->query($sql);
    $data =  $result->fetch_assoc();

    if ($data['total'] > 0) {
        $response = array('status' => false, 'message' => 'exists');
        echo json_encode($response);
        return;
    }


    $sql = "INSERT INTO user (email, password, fullname)
    VALUES ('$email','$password', '$fullname')";

    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'message' => 'failure');
        echo json_encode($response);
    }
}

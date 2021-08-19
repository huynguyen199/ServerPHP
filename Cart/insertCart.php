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
    $book_id = $_POST['book_id'];
    $amount = $_POST['amount'];



    $sql = "INSERT INTO cart (amount,book_id)
    VALUES ('$amount','$book_id')";


    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'message' => 'failure');
        echo json_encode($response);
    }
}

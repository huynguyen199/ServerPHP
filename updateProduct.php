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
    $title = $_POST['title'];
    $price = $_POST['price'];
    $authors = $_POST['authors'];
    $name = $_POST['name'];
    $categories_id = $_POST['categories_id'];


    $sql = "UPDATE book SET title='$title', price='$price',authors='$authors',name='$name',categories_id='$categories_id' WHERE id='$id'";


    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'message' => 'failure');
        echo json_encode($response);
    }
}

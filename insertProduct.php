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
    $title = $_POST['title'];
    $price = $_POST['price'];
    $authors = $_POST['authors'];
    $name = $_POST['name'];
    $image = $_POST['image'];

    $categories_id = $_POST['categories_id'];


    $sql = "INSERT INTO book (title, price, authors,name,image,categories_id)
    VALUES ('$title','$price', '$authors','$name','$image','$categories_id')";

    if (mysqli_query($conn, $sql)) {
        $response = array('status' => true, 'message' => 'success');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'message' => 'failure');
        echo json_encode($response);
    }
}

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


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM book";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $response["Book"] = array();

        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $product = array();
            $product["id"] = $row["id"];
            $product["name"] = $row["name"];
            $product["title"] = $row["title"];

            array_push($response["Book"], $product);
        }
        echo json_encode($response);
    }
}

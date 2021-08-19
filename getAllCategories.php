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
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $response["Categories"] = array();

        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $categories = array();
            $categories["id"] = $row["id"];
            $categories["name"] = $row["name"];

            array_push($response["Categories"], $categories);
        }
        echo json_encode($response);
    }
}

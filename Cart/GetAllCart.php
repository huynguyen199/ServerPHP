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
    $sql = "SELECT * FROM book JOIN cart ON cart.book_id = book.id";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $response["Cart"] = array();

        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $cart = array();
            $cart["id"] = $row["id"];
            $cart["amount"] = $row["amount"];
            $cart["name"] = $row["name"];
            $cart["book_id"] = $row["book_id"];
            $cart["title"] = $row["title"];
            $cart["price"] = $row["price"];
            $cart["authors"] = $row["authors"];
            $cart["name"] = $row["name"];
            $cart["categories_id"] = $row["categories_id"];

            array_push($response["Cart"], $cart);
        }
        echo json_encode($response);
    }
}

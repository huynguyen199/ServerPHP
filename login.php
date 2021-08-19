<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdb";



//Json Decode




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user WHERE email='$email' && password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // echo "Email: " . $row["email"] . "<br>";
        }

        $response = array('status' => true, 'message' => 'success');
        // $person = array(
        //     "name" => "KINGASV",
        //     "title" => "CTO"
        // );
        // $personJSON = json_encode($person); //returns JSON string
        // echo $personJSON;
    } else {
        $response = array('status' => false, 'message' => 'failure');
    }
    echo json_encode($response);
}

$conn->close();

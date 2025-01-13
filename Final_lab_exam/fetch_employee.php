<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_management";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = isset($_GET['query']) ? $_GET['query'] : ""; // Get the search query
$sql = "SELECT * FROM employees WHERE name LIKE '%$query%' OR username LIKE '%$query%'"; // Search query
$result = $conn->query($sql);

$employees = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}


echo json_encode($employees);

$conn->close();
?>

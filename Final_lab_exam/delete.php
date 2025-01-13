<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_management";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (!empty($id)) {
        $sql = "DELETE FROM employees WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Employee deleted successfully!";
        } else {
            echo "Error deleting employee: " . $conn->error;
        }
    } else {
        echo "Employee ID is required!";
    }
}

$conn->close();
?>

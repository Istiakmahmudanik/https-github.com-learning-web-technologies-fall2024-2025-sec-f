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
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];

    if (!empty($id) && !empty($name) && !empty($contact_no) && !empty($username)) {
        $sql = "UPDATE employees SET name='$name', contact_no='$contact_no', username='$username' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Employee updated successfully!";
        } else {
            echo "Error updating employee: " . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}

$conn->close();
?>

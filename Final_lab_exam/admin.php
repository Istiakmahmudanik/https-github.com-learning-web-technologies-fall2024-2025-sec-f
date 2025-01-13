<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_management";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!empty($name) && !empty($contact_no) && !empty($username) && !empty($password)) {
        $sql = "INSERT INTO employees (name, contact_no, username, password) VALUES ('$name', '$contact_no', '$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Employee added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];

    if (!empty($name) && !empty($contact_no) && !empty($username)) {
        $sql = "UPDATE employees SET name='$name', contact_no='$contact_no', username='$username' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Employee updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM employees WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Employee deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM employees WHERE name LIKE '%$query%' OR username LIKE '%$query%'";
    $result = $conn->query($sql);

    $employees = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    }
    echo json_encode($employees);
}

$conn->close();
?>

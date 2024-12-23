<?php
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize the user ID
        $user_id = $_POST['id'];

        // Prepare the SQL query using a prepared statement
        $stmt = $con->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);

        // Execute the query
        if ($stmt->execute()) {
            echo "User deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    }

    mysqli_close($con);
?>

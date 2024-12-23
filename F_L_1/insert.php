<?php
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    if ($_SERVER['REQUEST_METHOD'] ==
        $user_id = $_POST['id'];

        
        $stmt = $con->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);

        
        if ($stmt->execute()) {
            echo "User deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
    }

    mysqli_close($con);
?>

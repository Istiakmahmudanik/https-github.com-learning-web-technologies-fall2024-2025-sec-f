<?php
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
        $user_id = $_POST['id'];
        $new_name = mysqli_real_escape_string($con, $_POST['name']);
        $new_password = mysqli_real_escape_string($con, $_POST['password']);
        $new_email = mysqli_real_escape_string($con, $_POST['email']);

        
        $stmt = $con->prepare("UPDATE users SET name=?, password=?, email=? WHERE id=?");
        $stmt->bind_param("sssi", $new_name, $new_password, $new_email, $user_id);

       
        if ($stmt->execute()) {
            echo "User updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

       
        $stmt->close();
    }

    mysqli_close($con);
?>

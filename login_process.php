<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_207_user WHERE username = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                if ($password == $user['password']) {  
                    // Login successful, initialize the session
                    session_start();
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_type'] = $user['user_type'];
                    $_SESSION['user_f_name'] = $user['user_f_name'];
                    $_SESSION['img'] = $user['img'];

                    // Redirect to the dashboard or wherever you want
                    header("Location: dashboard.php");
                    exit;
                }
            }
        }

        $stmt->close();
    }
}

// If login failed, redirect back to the login page
header("Location: login.php");
exit;
?>
<?php
include('config.php');

// Will not work since creating a new therapist user needs verification and parent user needs to be made by an admn and link a patient with it.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $f_name = $POST['fName'];
    $l_name = $POST['lName'];
    $address = $POST['address'];
    $phone = $POST['phone'];
    $email = $POST[''];

    $sql = "INSERT INTO tbl_207_user (username, password, user_type, user_f_name, user_l_name, address, user_phone, user_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $username, $password, $type, $f_name, $l_name, $address, phone, $email);

        if ($stmt->execute()) {
            // Registration successful, redirect to the login page
            header("Location: login.php");
            exit;
        }

        $stmt->close();
    }
}

// If registration failed, redirect back to the registration page
header("Location: register.php");
exit;
?>

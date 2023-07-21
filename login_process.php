<?php
include('config.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // start a session only if one isn't started
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password1 = $_POST['password'];

    $sql = "SELECT * FROM tbl_207_user WHERE username = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            // Bind the result variables
            $stmt->bind_result($user_id, $username, $password, $user_type, $user_f_name, $user_l_name, $address, $user_phone, $user_email, $img);
            
            // Fetch the result into the bound variables
            if ($stmt->fetch()) {
                if ($password1 == $password) {  
                    // Login successful
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_type'] = $user_type;
                    $_SESSION['user_f_name'] = $user_f_name;
                    $_SESSION['img'] = $img;

                    $stmt->close(); // Close the statement

                    // Redirect to the dashboard or wherever you want
                    if ($_SESSION['user_type'] == 1) { // therapist
                        header("Location: patients.php");
                        exit;
                    } else if ($_SESSION['user_type'] == 2) { // parent
                        $sql = "SELECT * FROM tbl_207_patient WHERE parent_id = ?";
                        if ($stmt2 = $conn->prepare($sql)) {
                            $stmt2->bind_param("i", $_SESSION['user_id']);
                            if ($stmt2->execute()) {
                                // Bind the result variables
                                $stmt2->bind_result($patient_id, $age, $patient_address, $patient_f_name, $patient_l_name, $patient_phone, $patient_email, $parent_id, $carer_id, $patient_summary, $parent_img, $last_visit);

                                if ($stmt2->fetch()) {
                                    $stmt2->close(); // Close the statement
                                    header("Location: patientcontent.php?patient_id=" . $patient_id);
                                    exit;
                                }
                            }
                            $stmt2->close(); // Close the statement
                        }
                    }
                }
            }
            $stmt->close(); // Close the statement
        }
    }
}

// If login failed, redirect back to the login page
header("Location: index.php");
exit;
?>
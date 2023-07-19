<?php
// Check if the user is logged in
if (!isset($_SESSION['user_type'])) {
    // Not logged in, redirect to login page
    header('Location: login.php');
    exit;
}
?>

<?php
// Check if the user is logged in and is a therapist
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 1) {
    // Not logged in or not a therapist, redirect to restricted page
    header('Location: restricted.php');
    exit;
}
?>

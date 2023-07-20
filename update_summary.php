<?php
include('config.php');

// Check that the request is a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check that the summary exists
    if (isset($_POST['summary']) && isset($_POST['simulation_id'])) {
        $summary = $_POST['summary'];
        $simulation_id = $_POST['simulation_id'];

        // Prepare your SQL statement
        $stmt = $conn->prepare("UPDATE tbl_207_simulation SET simulation_summary = ? WHERE simulation_id = ?");

        // Check if the prepare was successful
        if ($stmt === false) {
            die("Failed to prepare SQL statement: " . $conn->error);
        }

        // Bind the summary to the SQL statement
        $stmt->bind_param('si', $summary, $simulation_id);

        // Execute the statement
        if ($stmt->execute()) {
            // If the update was successful, send a success response
            echo 1;
        } else {
            // If the update was unsuccessful, print out the SQL error
            die("Failed to execute SQL statement: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Summary or simulation_id not set in POST data");
    }
} else {
    die("Request was not a POST");
}
?>

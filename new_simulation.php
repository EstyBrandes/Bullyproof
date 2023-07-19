<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $patient_id = $_POST['patient_id'];

    $sql = "INSERT INTO tbl_207_simulation (simulation_name, simulation_date, patient_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $date, $patient_id);

        if ($stmt->execute()) {
            // Redirect to the patient's page
            header("Location: patient.php?id=" . $patient_id);
            exit;
        }

        $stmt->close();
    }
}

// If the creation fails, redirect back to the creation form
header("Location: new_simulation.php");
exit;
?>
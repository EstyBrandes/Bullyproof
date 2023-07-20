<?php
include('config.php');  // Include your database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $simulation_id = $_POST['simulation_id'];

    // Prepare SQL to update the simulation date
    $sql = "UPDATE tbl_207_simulation 
            SET simulation_date = DATE_ADD(simulation_date, INTERVAL 7 DAY) 
            WHERE simulation_id = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $simulation_id);

        // Execute the update query
        if ($stmt->execute()) {
            // Check if any row has been updated
            if ($stmt->affected_rows > 0) {
               // Fetch the updated record
                $sql = "SELECT simulation_date FROM tbl_207_simulation WHERE simulation_id = ?";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("i", $simulation_id);
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        $simulation = $result->fetch_assoc();

                        echo json_encode(array(
                            'status' => 1,
                            'simulation_date' => $simulation['simulation_date']
                        ));
                    } else {
                        echo json_encode(array('status' => 0));
                    }
                }
            } else {
                echo json_encode(array('status' => 0));
            }
        } else {
            echo json_encode(array('status' => 0));
        }

        $stmt->close();
    } else {
        echo json_encode(array('status' => 0));
    }
} else {
    echo json_encode(array('status' => 0));
}
?>
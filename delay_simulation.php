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
                        $stmt->bind_result($simulation_date);  // bind the result column to the variable

                        if ($stmt->fetch()) {  // fetch the result
                            echo json_encode(array(
                                'status' => 1,
                                'simulation_date' => $simulation_date
                            ));
                        } else {
                            echo json_encode(array('status' => 0));
                        }
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
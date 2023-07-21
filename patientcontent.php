<?php
    include "config.php";
    $patient_id = $_GET['patient_id'];
    

    // Prepare the SQL to fetch the patient's details
    $sql = "SELECT * FROM tbl_207_patient WHERE patient_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $patient_id);
    if ($stmt->execute()) {
        $stmt->bind_result($patient_id, $age, $patient_address, $patient_f_name, $patient_l_name, $patient_phone, $patient_email, $parent_id, $carer_id, $patient_summary, $parent_img, $last_visit);
        // Fetch the patient's details
        while ($stmt->fetch()) {
            $patient = array(
                'patient_id' => $patient_id,
                'patient_f_name' => $patient_f_name,
                'patient_l_name' => $patient_l_name,
                'age' => $age,
                'patient_address' => $patient_address,
                'patient_email' => $patient_email,
                'parent_id' => $parent_id,
                'parent_img' => $parent_img,
                'patient_phone' => $patient_phone,
                'carer_id' => $carer_id,
                'patient_summary' => $patient_summary,
                'last_visit' => $last_visit
            );
        }
    }
    $stmt->close();

    // Prepare the SQL to fetch the patient's simulations
    $sql = "SELECT * FROM tbl_207_simulation WHERE patient_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $patient_id);
    if ($stmt->execute()) {
        $stmt->bind_result($simulation_id, $patient_id, $simulation_name, $simulation_date, $simulation_summary, $simulation_img, $anomalies );
        // Fetch the patient's simulations
        $simulations = array();
        while ($stmt->fetch()) {
            $simulations[] = array(
                'simulation_id' => $simulation_id,
                'patient_id' => $patient_id,
                'simulation_name' => $simulation_name,
                'simulation_date' => $simulation_date,
                'anomalies' => $anomalies,
                'simulation_summary' => $simulation_summary,
                'simulation_img' => $simulation_img  
            );
        }
    }
    $stmt->close();

    // Prepare the SQL to fetch the parent's details
    $sql = "SELECT * FROM tbl_207_user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $patient['parent_id']);
    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $username, $password, $user_type, $user_f_name, $user_l_name, $address, $user_phone, $user_email, $img);
        // Fetch the parent's details
        while ($stmt->fetch()) {
            $parent = array(
                'user_id' => $user_id,
                'user_f_name' => $user_f_name,
                'user_l_name' => $user_l_name,
                'user_email' => $user_email,
                'password' => $password,
                'user_type' => $user_type,
                'img' => $img,
                'username' => $username,
                'address' => $address,
                'user_phone' => $user_phone
            );
        }
    }
    $stmt->close();

    // Get the full name of the parent
    $parent_name = $parent['user_f_name'] . ' ' . $parent['user_l_name'];

    $name = $patient['patient_f_name'] . ' ' . $patient['patient_l_name'];
    $pageTitle = $name;
    $breadcrumbs = '<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patients.php">Patients</a></li>
                            <li class="breadcrumb-item"><a href=#>'. $name .'</a></li>
                        </ol>';
    include "top_layout.php";
?>


<?php




function getWarningDiv($anomalies) {
    if ($anomalies === 2) {
        return 'red-warning';
    } elseif ($anomalies === 0) {
        return 'missing-anomalies';
    } elseif ($anomalies === 1) {
        return 'yellow-warning';
    } else {
        return '';
    }
}


?>

    <div class="content-box">
                   <section class="main-details">
                        <div class="person">
                                <div class="imageliam">
                                <img width="80" height="80" class="img rounded-circle" alt="avatar" src="<?php echo $patient['parent_img']; ?>"/></div>
                                <p class="liamheader"><?php echo $name; ?></p>
                        </div>
                        <section class="details">
                        <?php if ($_SESSION['user_type'] == '2'): ?>
                        <div class="patient-details-parent">
                            <p>Age: <?php echo $patient['age']; ?></p>
                            <p>ID: <?php echo $patient['patient_id']; ?></p>
                            <p>Address: <?php echo $patient['patient_address']; ?></p>
                            <p>Parent: <?php echo $parent_name; ?></p>
                            <p>Email: <?php echo $patient['patient_email']; ?></p>
                        </div>
                        <?php else: ?>
                        <div class="information">
                            <p>Age: <?php echo $patient['age']; ?></p>
                            <p>ID: <?php echo $patient['patient_id']; ?></p>
                            <p>Address: <?php echo $patient['patient_address']; ?></p>
                            <p>Parent: <?php echo $parent_name; ?></p>
                            <p>Email: <?php echo $patient['patient_email']; ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="summary">
                            <?php if ($_SESSION['user_type'] == '1'): ?>
                                <p>Case Summary:</p>
                                <div class="edit"></div>
                                <div class="textbox">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="4">Meital Edit:</textarea>
                                </div>
                            <?php endif; ?>
                        </div>
                        </section>
                        <hr class="divider">
                        <section class="history">
                            <table class="table" class="history-list">
                                <thead>
                                    <tr>
                                        <th scope="col">Simulation</th>
                                        <th scope="col">Date</th>
                                        <?php if ($_SESSION['user_type'] == '1'): ?>
                                            <th scope="col">Anomalies</th>
                                        <?php endif; ?>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($simulations as $simulation): ?>
                                    <tr>
                                        <th scope="row"><?php echo htmlspecialchars($simulation['simulation_name']); ?></th>
                                        <td data-key="simulation_date" data-id="<?php echo $simulation['simulation_id']?>"><?php echo htmlspecialchars($simulation['simulation_date']); ?></td>
                                        <?php if ($_SESSION['user_type'] == '1'): ?>
                                            <td>
                                                <div class="<?php echo getWarningDiv($simulation['anomalies']); ?>"></div>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <div class="modify">
                                                <?php if ($_SESSION['user_type'] == 1) : ?>
                                                    <div  class="pen edit-btn" data-simulationsummary="<?php echo $simulation['simulation_summary']; ?>" data-simulationid="<?php echo $simulation['simulation_id']; ?>" data-toggle="modal" data-target="#therapistModal"></div>
                                                <?php elseif ($_SESSION['user_type'] == 2 && (strtotime($simulation['simulation_date']) > time())): ?>
                                                    <div class="pen parent-edit-btn" data-simulationid="<?php echo $simulation['simulation_id']; ?>" data-toggle="modal" data-target="#parentModal"></div>
                                                <?php endif; ?>
                                                <?php if ($_SESSION['user_type'] == 1): ?>
                                                    <div class="send"></div>
                                                    <div class="simulation"></div>
                                                    <div class="download"></div>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </section>


           
<?php
    include "modal.php";
    include "bottom_layout.php";
    mysqli_close($conn);

?>
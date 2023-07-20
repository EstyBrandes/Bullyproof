<?php
    include "config.php";
    $patient_id = $_GET['patient_id'];
    

    // Prepare the SQL to fetch the patient's details
    $sql = "SELECT * FROM tbl_207_patient WHERE patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the patient's details
    $patient = $result->fetch_assoc();

    // Prepare the SQL to fetch the patient's simulations
    $sql = "SELECT * FROM tbl_207_simulation WHERE patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the patient's simulations
    $simulations = $result->fetch_all(MYSQLI_ASSOC);

    // Prepare the SQL to fetch the parent's details
    $sql = "SELECT * FROM tbl_207_user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patient['parent_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the parent's details
    $parent = $result->fetch_assoc();

    // Get the full name of the parent
    $parent_name = $parent['user_f_name'] . ' ' . $parent['user_l_name'];

    // Close the statement
    $stmt->close();

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
                                <div class="imageliam"></div>
                                <p class="liamheader"><?php echo $name; ?></p>
                        </div>
                        <section class="details">
                        <?php if ($_SESSION['user_type'] == '2'): ?>
                        <div class="patient-details-parent">
                            <img src="<?php echo $patient['img']; ?>" alt="Patient Image">
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
                                        <td><?php echo htmlspecialchars($simulation['simulation_date']); ?></td>
                                        <?php if ($_SESSION['user_type'] == '1'): ?>
                                            <td>
                                                <div class="<?php echo getWarningDiv($simulation['anomalies']); ?>"></div>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                           <div class="modify row">
                                                <div class="col col-sm-6">
                                                    <i class="fa-solid fa-pen"></i>
                                                </div>
                                                <?php if ($_SESSION['user_type'] == '1'): ?>
                                                    <div class="col col-sm-6">
                                                        <i class="fa-regular fa-paper-plane"></i>
                                                    </div>
                                                    <div class="col col-sm-6">
                                                    <i class="fa-regular fa-circle-play"></i>
                                                    </div>
                                                    <div class="col col-sm-6">
                                                        <i class="fa-solid fa-download"></i>
                                                    </div>>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </section>
                </div>
            </section>

<?php
    include "bottom_layout.php";
    mysqli_close($conn);
?>

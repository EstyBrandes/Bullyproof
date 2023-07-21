<?php
    include "config.php";
    include "t_auth_check.php";
    $pageTitle = "Patients";
    $breadcrumbs = '<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href=#>Home</a></li>
                            <li class="breadcrumb-item"><a href=#>Patients</a></li>
                        </ol>';
    include "top_layout.php";
?>

<?php
$user_id = $_SESSION['user_id'];

$sql = "SELECT patient_id, patient_f_name, patient_l_name, last_visit FROM tbl_207_patient WHERE carer_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

$stmt->execute();

$stmt->bind_result($patient_id, $patient_f_name, $patient_l_name, $last_visit);

$patients = [];
while ($stmt->fetch()) {
    $patients[] = ['patient_id' => $patient_id, 'patient_f_name' => $patient_f_name, 'patient_l_name' => $patient_l_name, 'last_visit' => $last_visit];
}

?>

    <div class="content-box">
        <div class="table-list">
            <div class="tabletop">
                <h2>Recent Patient</h2>
                <div class="top-part"></div>
                <a href="addPatinent.html" class="add">
                    <span class="add-icon"></span>
                </a>
            </div>
            <div class="table-responsive-vertical shadow-z-1">
                <table id="table" class="table table-hover table-mc-light-blue">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last visit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient): ?>
                        <tr class="clickable-row" data-href="patientcontent.php?patient_id=<?php echo $patient['patient_id']; ?>">
                            <td data-title="ID"><?php echo htmlspecialchars($patient['patient_id']); ?></td>
                            <td data-title="Name"><?php echo htmlspecialchars($patient['patient_f_name'] . ' ' . $patient['patient_l_name']); ?></td>
                            <td data-title="Status"><?php echo htmlspecialchars($patient['last_visit']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="script.js"></script>
            </div>


<?php
    include "bottom_layout.php";
    mysqli_close($conn);
?>

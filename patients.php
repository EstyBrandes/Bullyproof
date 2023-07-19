<?php
    session_start();
    include "config.php";
    include "base.php";
?>

<?php 

    $query 	= "SELECT * FROM tbl_207_patients";
	$result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }

    $sql = "SELECT 
            patient_f_name,
            patient_l_name,
            patient_id,
            last_visit
        FROM
            tbl_207_patient";

// Execute the query
try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error executing query: " . $e->getMessage());
}
?>

 <!DOCTYPE html>
<html lang="en">


<body>
    <div class="content-box">
        <div class="table-list">
            <div class="tabletop">
                <h2>Recent Patient</h2>
                <div class="top-part"></div>
                <div class="search">
                    <h3>Patient's ID</h3>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
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
                        <tr class="clickable-row" data-href="patientcontent.php">
                            <td data-title="ID"><?php echo htmlspecialchars($patient['patient_id']); ?></td>
                            <td data-title="Name"><?php echo htmlspecialchars($patient['patient_f_name'] . ' ' . $patient['patient_l_name']); ?></td>
                            <td data-title="Status"><?php echo htmlspecialchars($patient['last_visit']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="script.js"></script>
                <button>Next</button>
            </div>
        </div>
    </div>
    <footer>
        <p class="copyright">&copy;2023 Dror Institute, All rights reserved</p>
    </footer>

</body>

</html>

<?php
    mysqli_close($connection);
?>

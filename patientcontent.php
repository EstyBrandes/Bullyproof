<?php
    include "config.php";
    include "base.php";
    ?>


<?php
$sql = "SELECT 
patient_f_name,
patient_l_name,
age,
patient_id,
patient_address,
patient_phone,
patient_email
FROM
tbl_user_patient";

try {
$stmt = $pdo->query($sql);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);


$name = $patient['patient_f_name'] . ' ' . $patient['patient_l_name'];
$age = $patient['age'];
$id = $patient['patient_id'];
$address = $patient['patient_address'];
$parentPhone = $patient['patient_phone'];
$email = $patient['patient_email'];
} catch (PDOException $e) {
die("Error executing query: " . $e->getMessage());
}


try {
    $stmt = $pdo->query("SELECT simulation_name, simulation_date, anomalies FROM tbl_207_simulation");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving data: " . $e->getMessage());
}

function getWarningDiv($anomalies) {
    if ($anomalies === '2') {
        return 'red-warning';
    } elseif ($anomalies === '0') {
        return 'missing-anomalies';
    } elseif ($anomalies === '1') {
        return 'yellow-warning';
    } else {
        return '';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<html>
<body>
    <div class="content-box">
                   <section class="main-details">
                        <section class="details">
                        <div class="information">
                            <p>Age: <?php echo $age; ?></p>
                            <p>ID: <?php echo $id; ?></p>
                            <p>Address: <?php echo $address; ?></p>
                            <p class="contact">Contact Info:</p>
                            <p>Parent: <?php echo $parentPhone; ?></p>
                            <p>Email: <?php echo $email; ?></p>
                        </div>
                            <div class="summary">
                                <div class="person">
                                    <div class="imageliam"></div>
                                    <p class="liamheader"><?php echo $name; ?></p>
                                </div>
                                <p>Case Summary:</p>
                                <div class="edit"></div>
                                <div class="textbox">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="4">Meital Edit:</textarea>
                                </div>

                        </section>
                        <hr class="divider">
                        <section class="history">
                            <table class="table" class="history-list">
                                <thead>
                                    <tr>
                                        <th scope="col">Simulation</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Anomalies</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row): ?>
                                    <tr>
                                        <th scope="row"><?php echo htmlspecialchars($row['simulation_name']); ?></th>
                                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                                        <td>
                                            <div class="<?php echo getWarningDiv($row['anomalies']); ?>"></div>
                                        </td>
                                        <td>
                                            <div class="modify">
                                                <div class="pen"></div>
                                                <div class="send"></div>
                                                <div class="simulation"></div>
                                                <div class="download"></div>
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
        </div>
    </div>

    <footer>
        <p class="copyright">&copy;2023 Dror Institute, All rights reserved</p>
    </footer>

</body>

</html>
<?php
    // Retrieve POST data
    $fullName = isset($_POST['full-name']) ? $_POST['full-name'] : 'ERROR';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : 'ERROR';
    $idNumber = isset($_POST['id-number']) ? $_POST['id-number'] : 'ERROR';
    $cityName = isset($_POST['city-name']) ? $_POST['city-name'] : 'ERROR';
    $streetName = isset($_POST['street-name']) ? $_POST['street-name'] : 'ERROR';
    $houseNumber = isset($_POST['house-number']) ? $_POST['house-number'] : 'ERROR';
    $apartmentNumber = isset($_POST['apartment-number']) ? $_POST['apartment-number'] : 'ERROR';

    $parent1Name = isset($_POST['parent1-name']) ? $_POST['parent1-name'] : 'ERROR';
    $parent1Phone = isset($_POST['parent1-phone']) ? $_POST['parent1-phone'] : 'ERROR';
    $parent1Email = isset($_POST['parent1-email']) ? $_POST['parent1-email'] : 'ERROR';

    $parent2Name = isset($_POST['parent2-name']) ? $_POST['parent2-name'] : 'ERROR';
    $parent2Phone = isset($_POST['parent2-phone']) ? $_POST['parent2-phone'] : 'ERROR';
    $parent2Email = isset($_POST['parent2-email']) ? $_POST['parent2-email'] : 'ERROR';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Information</title>
    <style>
        /* CSS to make the image round */
        .round-img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Patient Information</h1>

    <ul>
        <li><strong>Full Name:</strong> <?php echo htmlspecialchars($fullName); ?></li>
        <li><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></li>
        <li><strong>ID Number:</strong> <?php echo htmlspecialchars($idNumber); ?></li>
        <li><strong>City:</strong> <?php echo htmlspecialchars($cityName); ?></li>
        <li><strong>Street:</strong> <?php echo htmlspecialchars($streetName); ?></li>
        <li><strong>House Number:</strong> <?php echo htmlspecialchars($houseNumber); ?></li>
        <li><strong>Apartment Number:</strong> <?php echo htmlspecialchars($apartmentNumber); ?></li>
    </ul>

    <h2>Parent #1 Information</h2>
    <ul>
        <li><strong>Full Name:</strong> <?php echo htmlspecialchars($parent1Name); ?></li>
        <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($parent1Phone); ?></li>
        <li><strong>Email Address:</strong> <?php echo htmlspecialchars($parent1Email); ?></li>
    </ul>

    <h2>Parent #2 Information</h2>
    <ul>
        <li><strong>Full Name:</strong> <?php echo htmlspecialchars($parent2Name); ?></li>
        <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($parent2Phone); ?></li>
        <li><strong>Email Address:</strong> <?php echo htmlspecialchars($parent2Email); ?></li>
    </ul>

</body>
</html>

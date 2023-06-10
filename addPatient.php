<?php 
   
	include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>

<body>
    <header>
        <a href="patients.php">
            <div class="bulliproof"></div>
        </a>
        <div class="dror"></div>
    </header>
    <div class="my-container">
        <div id="wrapper">
            <section class="sidebar-menu">
                <div class="sidebar">
                    <div class="hamburger">
                        <h2 class="bar-text">MENU</h2>
                        <div class="side-btn-hem">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <ul class="ul-sidebar">
                        <li class="close-it">
                            <a href="#"><span class="bar-text">Patients</span>
                                <div class="fafaicon">
                                    <img src="images/profileblack.png" alt="profile" target="profile" />
                                </div>
                            </a>
                        </li>
                        <li class="close-it">
                            <a href="#"><span class="bar-text">Simulations</span>
                                <div class="fafaicon">
                                    <img src="images/simulationblack.png" alt="simulation" target="simulation" />
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </section>
            <section class="main-content">
                <div class="top-part">
                    <div class="headline">
                        <div class="left-header">
                            <h1 class="patients">Patients</h1>
                        </div>
                    </div>
                    <div class="left-top">
                        <section class="profile">
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <p>Welcome, Meital</p>
                                    <img src="images/meital.png" alt="meital" class="rounded-circle me-2">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                    <li><a class="dropdown-item" href="#">New project...</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                                </ul>
                            </div>
                        </section>


                    </div>

                </div>
                <div class="bread-crumbs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patients.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="patients.php">Patients</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Patient</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="content-box">
                    <div class="container">
                        <form action="process_patient_info.php" method="post">
                            <fieldset>
                                <legend>Add a New Patient</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Patient Information</h5>
                                                <div class="form-group">
                                                    <label for="full-name">Full Name:*</label>
                                                    <input type="text" id="full-name" name="full-name"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth:*</label>
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id-number">ID Number:*</label>
                                                    <input type="text" id="id-number" name="id-number" pattern="\d{9}"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="city-name">City:*</label>
                                                    <input type="text" id="city-name" name="city-name"
                                                        class="form-control" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="street-name">Street:*</label>
                                                    <input type="text" id="street-name" name="street-name"
                                                        class="form-control" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="house-number">House Number:*</label>
                                                    <input type="number" id="house-number" name="house-number"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="apartment-number">Apartment Number:</label>
                                                    <input type="number" id="apartment-number" name="apartment-number"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image-upload">Upload an Image:</label>
                                                    <input type="file" class="form-control-file" id="image-upload"
                                                        name="image-upload" accept=".jpg, .jpeg, .png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Parent #1 Information</h5>
                                                <div class="form-group">
                                                    <label for="parent1-name">Parent #1 Full Name:*</label>
                                                    <input type="text" id="parent1-name" name="parent1-name"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent1-phone">Parent #1 Phone Number:*</label>
                                                    <input type="tel" id="parent1-phone" name="parent1-phone"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent1-email">Parent #1 Email Address:*</label>
                                                    <input type="email" id="parent1-email" name="parent1-email"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Parent #2 Information</h5>
                                                <div class="form-group">
                                                    <label for="parent2-name">Parent #2 Full Name:</label>
                                                    <input type="text" id="parent2-name" name="parent2-name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent2-phone">Parent #2 Phone Number:</label>
                                                    <input type="tel" id="parent2-phone" name="parent2-phone"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent2-email">Parent #2 Email Address:</label>
                                                    <input type="email" id="parent2-email" name="parent2-email"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-lg">Add Patient</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </section>
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

<?php
    include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(mysqli_connect_errno()){
        die("DB connection failed: " .mysqli_connect_error() . "(" .mysqli_connect_errno() . ")"
         );
    }
?>

<?php 

    $query 	= "SELECT * FROM tbl_207_users order by name";
	$result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
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
    
    <div id="my-wrapper">
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
        <div class="my-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Patients</a></li>
                </ol>
            </nav>
            <section class="main-content">
                <div class="top-part">
                    <div class="headline">
                        <h1>Patients</h1>
                    </div>
                    <div class="dropdown" class="profile">
                        <div class="dropdown-toggle-container">
                            <span class="welcome-text">Welcome, Meital</span>
                            <img src="images/meital.png" alt="meital" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="/index.php">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <tr class="clickable-row" data-href="liam.html">
                                        <td data-title="ID">261020030</td>
                                        <td data-title="Name">Liam Golan</td>
                                        <td data-title="Status">21/01/2023 14:33:20</td>
                                    </tr>
                                    <tr class="clickable-row">
                                        <td data-title="ID">202020200</td>
                                        <td data-title="Name">Tony Stark</td>
                                        <td data-title="Status">21/01/2023 12:31:20</td>
                                    </tr>
                                    <tr class="clickable-row">
                                        <td data-title="ID">029051970</td>
                                        <td data-title="Name">Bruce Wayne</td>
                                        <td data-title="Status">21/01/2023 10:30:01</td>
                                    </tr>
                                    <tr class="clickable-row">
                                        <td data-title="ID">080619950</td>
                                        <td data-title="Name">Bruce Banner</td>
                                        <td data-title="Status">21/01/2023 10:00:25</td>
                                    </tr>
                                    <tr class="clickable-row">
                                        <td data-title="ID">091219060</td>
                                        <td data-title="Name">Barry Allen</td>
                                        <td data-title="Status">21/01/2023 09:40:37</td>
                                    </tr>
                                    <tr class="clickable-row">
                                        <td data-title="ID">230419330</td>
                                        <td data-title="Name">Natasha Romanoff</td>
                                        <td data-title="Status">21/01/2023 09:10:40</td>
                                    </tr>
                                </tbody>
                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="script.js"></script>
                            <button>Next</button>
                        </div>
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

<?php
    include "config.php";
?>

<?php 

    $query 	= "SELECT * FROM tbl_prods order by name";
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                            <li class="breadcrumb-item"><a href="patients.php">Patients</a></li>
                            <li class="breadcrumb-item active"><a href="#">Liam Golan</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="content-box">
                    <section class="main-details">
                        <section class="details">
                            <div class="information">
                                <p>Age:7</p>
                                <p>ID:261020030</p>
                                <p>Address:Arie Shenkar 12, Petah-Tikva</p>
                                <p class="contact">Contact Info:</p>
                                <p>Parent: 052-26102003</p>
                                <p>Email: Eyalandilanit@gmail.com</p>
                            </div>
                            <div class="summary">
                                <div class="person">
                                    <div class="imageliam"></div>
                                    <p class="liamheader">Liam Golan</p>
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
                                    <tr>
                                        <th scope="row">S.12 - 17.01.23</th>
                                        <td>17/01/2023 14:33:20</td>
                                        <td>
                                            <div class="red-warning"></div>
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
                                    <tr>
                                        <th scope="row">S.11 - 05.01.23</th>
                                        <td>05/01/2023 15:20:00</td>
                                        <td>
                                            <div class="missing-anomalies"></div>
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
                                    <tr>
                                        <th scope="row">S.10 - 28.12.22</th>
                                        <td>28/12/2022 16:40:42</td>
                                        <td>
                                            <div class="missing-anomalies"></div>
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
                                    <tr>
                                        <th scope="row">S.09- 12.12.22</th>
                                        <td>12/12/2022 14:29:11</td>
                                        <td>
                                            <div class="yellow-warning"></div>
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
                                    <tr>
                                        <th scope="row">S.08- 08.12.22</th>
                                        <td>08/12/2022 14:21:09</td>
                                        <td>
                                            <div class="yellow-warning"></div>
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

<?php
    mysqli_close($connection);
?>

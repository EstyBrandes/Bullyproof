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
    <title><?php echo $pageTitle; ?></title>
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
                            <h1 class="patients"><?php echo $pageTitle; ?></h1>
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
                        <?php echo $breadcrumbs; ?>
                    </nav>
                </div>
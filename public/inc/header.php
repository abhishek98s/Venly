<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venly | Venue Booking System</title>
    <link rel="stylesheet" href="dist/css/vendor.css">
    <link rel="stylesheet" href="dist/css/themes.css">
</head>

<body>
    <nav class="d-flex align-items-center">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a href="index.php">
                    <figure class="logo">
                        <img src="./images/logo.svg" alt="logo">
                    </figure>
                </a>

                <div class="nav_items_wrapper d-none d-md-flex d-flex justify-content-end">
                    <div class="nav-wrapper d-flex gap-2">
                        <a href="index.php" class="nav-item color-primary-800">Home</a>
                        <a href="list.php" class="nav-item color-primary-800">Venue List</a>
                        <?php
                        session_start();

                        if (!isset($_SESSION['isAuthenticated'])) {
                            echo '<a href="login.php" class="nav-item color-primary-800">Login</a>';
                            echo '<a href="register.php" class="nav-item fw-bold color-primary-800 bg-primary-600">Register</a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="d-block d-md-none icon-menu">
                    <a href="#">
                        <figure>
                            <img src="images/icons/icon-menu.svg" alt="icon-menu">
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </nav>
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
    <div class="d-flex w-100">
        <?php
        if (!session_id()) {
            session_start();
        }

        if (!isset($_SESSION['isAuthenticated'])) {
            echo '<a href="venue-list" class="d-block py-3 color-primary-700 text-16">Venue</a>';
            header('Location: login.php');
        }
        ?>
        <aside class="sidebar-wrapper">
            <header class="p-2 d-flex justify-content-between align-items-center">
                <figure>
                    <img src="images/logo.svg" alt="logo">
                </figure>
                <!-- 
                <a href="#">
                    <figure>
                        <img src="images/icons/icon-menu.svg" alt="logo">
                    </figure>
                </a> -->
            </header>

            <div class="pt-4 w-100">
                <ul class="w-100 ps-2">
                    <li class="w-100 px-2">
                        <a href="venue-list" class="d-block py-3 color-primary-700 text-16">Venue</a>
                    </li>
                    <li class="w-100 px-2">
                        <a href="user-list" class="d-block py-3 color-primary-700 text-16">User list</a>
                    </li>
                    <li class="w-100 px-2">
                        <a href="booking-list" class="d-block py-3 color-primary-700 text-16">Booking list</a>
                    </li>
                    <li class="w-100 px-2">
                        <button href="javascript:void()" id="logout-btn"
                            class="border-0 bg-transparent w-100 text-start d-block py-3 color-primary-700 text-16">Logout
                            </>
                    </li>
                </ul>
            </div>
        </aside>
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

        <aside class="sidebar-wrapper">
            <header class="p-2 d-flex justify-content-between align-items-center">
                <figure>
                    <img src="images/logo.svg" alt="logo">
                </figure>

                <a href="#">
                    <figure>
                        <img src="images/icons/icon-menu.svg" alt="logo">
                    </figure>
                </a>
            </header>

            <div class="pt-4 w-100">
                <ul class="w-100 ps-2">
                    <li class="w-100 px-2">
                        <a href="venue-list" class="d-block py-3 color-primary-700 text-16">Venue</a>
                    </li>
                    <li class="w-100 active px-2">
                        <a href="user-list" class="d-block py-3 color-primary-700 text-16">User list</a>
                    </li>
                    <li class="w-100 px-2">
                        <a href="booking-list" class="d-block py-3 color-primary-700 text-16">Booking list</a>
                    </li>
                </ul>
            </div>
        </aside>

        <?php
        include("backend/db.php");
        // Get the ID from the URL
        $id = $_GET['id'];

        // Query the venue table to retrieve the venue details
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch the venue details
            $row = $result->fetch_assoc();
        }
        ?>
        <div class="main px-3 w-100">
            <div class="header d-flex justify-content-between mb-5 align-items-end">
                <h2 class="text-24 fw-bold color-primary-800">Edit <?php echo $row['username']; ?></h2>

                <button class="primary-btn">Add Venue</button>
            </div>

            <form action="backend/user/update-user.php" method="post">
                <div class="row row-gap-3 mb-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Username</label>
                                    <input type="text" class="w-100" required name="username"
                                        value="<?php echo $row['username']; ?>">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Email</label>
                                    <input type="text" class="w-100" required name="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="text-16 mb-2 color-primary-800">Phone</label>
                                    <input type="number" class="w-100" required name="phone"
                                        value="<?php echo $row['phone']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if (isset($_SESSION['edit_error'])) {
                        echo '<div class="error-text">' . $_SESSION['edit_error'] . '</div>';
                        unset($_SESSION['edit_error']);
                    }
                ?>
                <button type="submit" class="primary-btn d-inline-flex justify-content-center align-items-center">Add
                    Venue</button>
            </form>
        </div>
    </div>
</body>

</html>
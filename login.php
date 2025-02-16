<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (isset($_SESSION['isAuthenticated'])) {
    header("Location: index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venly | Venue Booking System</title>
    <link rel="stylesheet" href="dist/css/vendor.css">
    <link rel="stylesheet" href="dist/css/themes.css">
</head>

<body>
    <div class="login-box">
        <div class="login-form border-primary-500 p-3 bg-primary-100">
            <h2 class="text-20 fw-bold color-primary-800 mb-3">Login</h2>
            <form action="backend/login.php" method="post">
                <label class="text-14 color-primary-700" for="username">Username:</label>
                <input class="bg-transparent border-primary-600 mb-3" type="text" id="username" name="username"
                    required>

                <label class="text-14 color-primary-700" for="password">Password:</label>
                <input class="bg-transparent border-primary-600" type="password" id="password" name="password" required>

                <input type="submit" class="fw-bold text-16 submit-btn bg-primary-600 color-primary-800 mb-3"
                    value="Login">

                <?php
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="error-text">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']);
                }
                ?>
            </form>
            <p class="text-14 color-primary-700">Don't have an account? <a href="register.php"
                    class="text-decoration-underline color-primary-800">Register</a></p>
            <a href="index.php" class="text-14 text-center d-block text-decoration-underline color-primary-800">HOME</a>
        </div>
    </div>
    <!-- <script src="dist/js/custom.js"></script> -->
</body>

</html>